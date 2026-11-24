<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Mesin;
use App\Models\Pool;
use App\Services\ZKTeco\ZKTecoClientInterface;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class MachineSyncService
{
    public function __construct(
        protected ZKTecoClientInterface $zkClient
    ) {}

    /**
     * Memeriksa koneksi jaringan ke mesin fingerprint via UDP.
     *
     * @return array{connected: bool, message: string, device_name: ?string, latency_ms: float}
     */
    public function checkConnection(Mesin $mesin): array
    {
        if ($mesin->tipe !== 'ip') {
            return [
                'connected' => false,
                'message' => "Mesin '{$mesin->name}' bertipe ".strtoupper((string) $mesin->tipe).'. Pengecekan koneksi jaringan hanya berlaku untuk tipe IP.',
                'device_name' => null,
                'latency_ms' => 0.0,
            ];
        }

        if (empty($mesin->ip) || empty($mesin->port)) {
            return [
                'connected' => false,
                'message' => "Alamat IP atau Port mesin '{$mesin->name}' belum dikonfigurasi.",
                'device_name' => null,
                'latency_ms' => 0.0,
            ];
        }

        $startTime = microtime(true);

        try {
            $connected = $this->zkClient->connect((string) $mesin->ip, (int) $mesin->port, 4);
            $latencyMs = round((microtime(true) - $startTime) * 1000, 1);

            if ($connected) {
                $deviceName = $this->zkClient->getDeviceName();
                $this->zkClient->disconnect();

                return [
                    'connected' => true,
                    'message' => "Mesin '{$mesin->name}' berhasil terhubung ({$mesin->ip}:{$mesin->port}).",
                    'device_name' => $deviceName ?? $mesin->name,
                    'latency_ms' => $latencyMs,
                ];
            }

            return [
                'connected' => false,
                'message' => "Gagal terhubung ke mesin '{$mesin->name}' ({$mesin->ip}:{$mesin->port}). Pastikan perangkat aktif dan dalam satu jaringan.",
                'device_name' => null,
                'latency_ms' => $latencyMs,
            ];
        } catch (Throwable $e) {
            $latencyMs = round((microtime(true) - $startTime) * 1000, 1);

            return [
                'connected' => false,
                'message' => 'Kendala koneksi ke mesin absensi: '.$e->getMessage(),
                'device_name' => null,
                'latency_ms' => $latencyMs,
            ];
        }
    }

    /**
     * Menyinkronkan log presensi dari 1 mesin absensi IP secara aman ke tabel pools.
     *
     * @return array{success: bool, fetched: int, inserted: int, skipped: int, message: string}
     */
    public function syncMachine(Mesin $mesin, bool $force = false): array
    {
        if ($mesin->tipe !== 'ip') {
            return [
                'success' => false,
                'fetched' => 0,
                'inserted' => 0,
                'skipped' => 0,
                'message' => "Mesin '{$mesin->name}' bertipe ".strtoupper((string) $mesin->tipe).', hanya mesin bertipe IP yang dapat disinkronkan via jaringan.',
            ];
        }

        if (empty($mesin->ip) || empty($mesin->port)) {
            return [
                'success' => false,
                'fetched' => 0,
                'inserted' => 0,
                'skipped' => 0,
                'message' => "Alamat IP atau Port mesin '{$mesin->name}' belum dikonfigurasi.",
            ];
        }

        // Atomic File-Lock untuk mencegah sinkronisasi ganda bersamaan
        $lockDir = storage_path('framework/locks');
        if (! is_dir($lockDir)) {
            @mkdir($lockDir, 0777, true);
        }

        $lockFile = $lockDir.'/machine_sync_'.$mesin->id.'.lock';
        $fp = fopen($lockFile, 'c+');

        if (! $fp) {
            return [
                'success' => false,
                'fetched' => 0,
                'inserted' => 0,
                'skipped' => 0,
                'message' => "Gagal membuat file lock sinkronisasi untuk mesin '{$mesin->name}'.",
            ];
        }

        if (! $force && ! flock($fp, LOCK_EX | LOCK_NB)) {
            fclose($fp);

            return [
                'success' => false,
                'fetched' => 0,
                'inserted' => 0,
                'skipped' => 0,
                'message' => "Mesin '{$mesin->name}' sedang disinkronkan oleh proses lain.",
            ];
        }

        try {
            // 1. Tarik log presensi via ZKTeco client
            if (! $this->zkClient->connect((string) $mesin->ip, (int) $mesin->port, 5)) {
                return [
                    'success' => false,
                    'fetched' => 0,
                    'inserted' => 0,
                    'skipped' => 0,
                    'message' => "Gagal menghubungkan ke mesin absensi '{$mesin->name}' ({$mesin->ip}:{$mesin->port}).",
                ];
            }

            try {
                $rows = $this->zkClient->getAttendanceLogs();
            } finally {
                $this->zkClient->disconnect();
            }

            $fetchedCount = count($rows);
            if ($fetchedCount === 0) {
                return [
                    'success' => true,
                    'fetched' => 0,
                    'inserted' => 0,
                    'skipped' => 0,
                    'message' => "Mesin '{$mesin->name}' terhubung, namun tidak ada data log baru di perangkat.",
                ];
            }

            // 2. Evaluasi Anti-Duplikasi & Filter Cutoff
            $lastTs = Pool::where('mesin_id', $mesin->id)->max('timestamp');
            $cutoff = $lastTs ? Carbon::parse($lastTs) : Carbon::create(1970, 1, 1, 0, 0, 0);

            // Muat data eksisting di sekitar cutoff untuk pencegahan duplikasi komposit
            $existingLookup = [];
            $recentExisting = Pool::where('mesin_id', $mesin->id)
                ->where('timestamp', '>=', $cutoff->copy()->subHours(24)->toDateTimeString())
                ->get(['iduser', 'timestamp', 'type']);

            foreach ($recentExisting as $item) {
                $tsStr = $item->timestamp instanceof Carbon
                    ? $item->timestamp->format('Y-m-d H:i:s')
                    : (string) $item->timestamp;
                $k = $mesin->id.'|'.$item->iduser.'|'.$tsStr.'|'.$item->type;
                $existingLookup[$k] = true;
            }

            $now = now()->toDateTimeString();
            $buffer = [];
            $skippedCount = 0;

            foreach ($rows as $r) {
                if (! isset($r['timestamp'], $r['iduser'])) {
                    $skippedCount++;

                    continue;
                }

                try {
                    $ts = Carbon::parse($r['timestamp']);
                } catch (Throwable) {
                    $skippedCount++;

                    continue;
                }

                // Cek cutoff & composite key
                $k = $mesin->id.'|'.$r['iduser'].'|'.$ts->format('Y-m-d H:i:s').'|'.((int) ($r['type'] ?? 0));
                if ($ts->lessThan($cutoff) || isset($existingLookup[$k])) {
                    $skippedCount++;

                    continue;
                }

                $existingLookup[$k] = true;

                $buffer[] = [
                    'uid' => (int) ($r['uid'] ?? 0),
                    'iduser' => (int) $r['iduser'],
                    'state' => (int) ($r['state'] ?? 0),
                    'year' => (int) $ts->format('Y'),
                    'month' => (int) $ts->format('m'),
                    'date' => $ts->toDateString(),
                    'time' => $ts->toTimeString(),
                    'timestamp' => $ts->toDateTimeString(),
                    'type' => (int) ($r['type'] ?? 0),
                    'mesin_id' => $mesin->id,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }

            if (empty($buffer)) {
                return [
                    'success' => true,
                    'fetched' => $fetchedCount,
                    'inserted' => 0,
                    'skipped' => $skippedCount,
                    'message' => "Data presensi mesin '{$mesin->name}' sudah mutakhir (seluruh {$fetchedCount} data telah tercatat di sistem).",
                ];
            }

            // 3. Batch Insert dalam transaksi aman
            DB::beginTransaction();
            try {
                foreach (array_chunk($buffer, 500) as $chunk) {
                    Pool::insert($chunk);
                }

                $newLatest = Pool::where('mesin_id', $mesin->id)->max('timestamp');
                if ($newLatest) {
                    $mesin->last_sync = $newLatest;
                    $mesin->save();
                }

                DB::commit();

                $insertedCount = count($buffer);

                return [
                    'success' => true,
                    'fetched' => $fetchedCount,
                    'inserted' => $insertedCount,
                    'skipped' => $skippedCount,
                    'message' => "Sinkronisasi mesin '{$mesin->name}' berhasil! {$insertedCount} log baru tersimpan, {$skippedCount} log lama dilewati.",
                ];
            } catch (Throwable $e) {
                DB::rollBack();
                Log::error("MachineSyncService gagal menyimpan data mesin {$mesin->id}: ".$e->getMessage());

                return [
                    'success' => false,
                    'fetched' => $fetchedCount,
                    'inserted' => 0,
                    'skipped' => $skippedCount,
                    'message' => 'Gagal menyimpan data ke database: '.$e->getMessage(),
                ];
            }
        } finally {
            flock($fp, LOCK_UN);
            fclose($fp);
        }
    }

    /**
     * Menyinkronkan seluruh mesin presensi bertipe IP secara berurutan.
     *
     * @return array{
     *     total_machines: int,
     *     success_count: int,
     *     fail_count: int,
     *     total_inserted: int,
     *     total_skipped: int,
     *     details: list<array<string, mixed>>
     * }
     */
    public function syncAllIpMachines(bool $force = false): array
    {
        $machines = Mesin::where('tipe', 'ip')->orderBy('id')->get();
        $details = [];
        $successCount = 0;
        $failCount = 0;
        $totalInserted = 0;
        $totalSkipped = 0;

        foreach ($machines as $machine) {
            $res = $this->syncMachine($machine, $force);
            $details[] = array_merge(['machine' => $machine->name, 'id' => $machine->id], $res);

            if ($res['success']) {
                $successCount++;
                $totalInserted += $res['inserted'];
                $totalSkipped += $res['skipped'];
            } else {
                $failCount++;
            }
        }

        return [
            'total_machines' => $machines->count(),
            'success_count' => $successCount,
            'fail_count' => $failCount,
            'total_inserted' => $totalInserted,
            'total_skipped' => $totalSkipped,
            'details' => $details,
        ];
    }

    /**
     * Parsing dan impor log kehadiran dari berkas .dat USB ZKTeco.
     *
     * Format baris standar ZKTeco:
     * [iduser/uid] \t [YYYY-MM-DD] \t [HH:MM:SS] \t [state] \t [type]
     *
     * @return array{success: bool, fetched: int, inserted: int, skipped: int, message: string}
     */
    public function importUsbDatFile(Mesin $mesin, UploadedFile $file): array
    {
        $realPath = $file->getRealPath();
        if (! $realPath || ! file_exists($realPath)) {
            return [
                'success' => false,
                'fetched' => 0,
                'inserted' => 0,
                'skipped' => 0,
                'message' => 'File tidak dapat dibaca dari server.',
            ];
        }

        $lines = file($realPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if ($lines === false || empty($lines)) {
            return [
                'success' => false,
                'fetched' => 0,
                'inserted' => 0,
                'skipped' => 0,
                'message' => 'Berkas USB .dat kosong atau tidak valid.',
            ];
        }

        $fetchedCount = count($lines);
        $lastTs = Pool::where('mesin_id', $mesin->id)->max('timestamp');
        $cutoff = $lastTs ? Carbon::parse($lastTs) : Carbon::create(1970, 1, 1, 0, 0, 0);

        // Preload composite key
        $existingLookup = [];
        $recentExisting = Pool::where('mesin_id', $mesin->id)
            ->where('timestamp', '>=', $cutoff->copy()->subHours(24)->toDateTimeString())
            ->get(['iduser', 'timestamp', 'type']);

        foreach ($recentExisting as $item) {
            $tsStr = $item->timestamp instanceof Carbon
                ? $item->timestamp->format('Y-m-d H:i:s')
                : (string) $item->timestamp;
            $k = $mesin->id.'|'.$item->iduser.'|'.$tsStr.'|'.$item->type;
            $existingLookup[$k] = true;
        }

        $now = now()->toDateTimeString();
        $buffer = [];
        $skippedCount = 0;

        foreach ($lines as $line) {
            $trimmed = trim($line);
            if ($trimmed === '') {
                continue;
            }

            // Pisahkan whitespace / tab
            $parts = preg_split('/\s+/', $trimmed);
            if (! is_array($parts) || count($parts) < 3) {
                $skippedCount++;

                continue;
            }

            $iduser = (int) $parts[0];
            $date = $parts[1];
            $time = $parts[2];
            $state = isset($parts[3]) ? (int) $parts[3] : 0;
            $type = isset($parts[4]) ? (int) $parts[4] : 0;

            try {
                $ts = Carbon::parse("{$date} {$time}");
            } catch (Throwable) {
                $skippedCount++;

                continue;
            }

            $k = $mesin->id.'|'.$iduser.'|'.$ts->format('Y-m-d H:i:s').'|'.$type;
            if ($ts->lessThan($cutoff) || isset($existingLookup[$k])) {
                $skippedCount++;

                continue;
            }

            $existingLookup[$k] = true;

            $buffer[] = [
                'uid' => $iduser,
                'iduser' => $iduser,
                'state' => $state,
                'year' => (int) $ts->format('Y'),
                'month' => (int) $ts->format('m'),
                'date' => $ts->toDateString(),
                'time' => $ts->toTimeString(),
                'timestamp' => $ts->toDateTimeString(),
                'type' => $type,
                'mesin_id' => $mesin->id,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        if (empty($buffer)) {
            return [
                'success' => true,
                'fetched' => $fetchedCount,
                'inserted' => 0,
                'skipped' => $skippedCount,
                'message' => "Berkas .dat diproses: Seluruh {$fetchedCount} data telah ada sebelumnya (0 data baru).",
            ];
        }

        DB::beginTransaction();
        try {
            foreach (array_chunk($buffer, 500) as $chunk) {
                Pool::insert($chunk);
            }

            $newLatest = Pool::where('mesin_id', $mesin->id)->max('timestamp');
            if ($newLatest) {
                $mesin->last_sync = $newLatest;
                $mesin->save();
            }

            DB::commit();

            $insertedCount = count($buffer);

            return [
                'success' => true,
                'fetched' => $fetchedCount,
                'inserted' => $insertedCount,
                'skipped' => $skippedCount,
                'message' => "Unggah berkas .dat berhasil! {$insertedCount} data log baru tersimpan, {$skippedCount} data lama/duplikat dilewati.",
            ];
        } catch (Throwable) {
            DB::rollBack();

            return [
                'success' => false,
                'fetched' => $fetchedCount,
                'inserted' => 0,
                'skipped' => $skippedCount,
                'message' => 'Gagal menyimpan data berkas .dat ke database.',
            ];
        }
    }
}
