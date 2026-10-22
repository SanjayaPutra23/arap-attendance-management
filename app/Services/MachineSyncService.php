<?php

namespace App\Services;

use App\Models\Akapool;
use App\Models\Mesin;
use App\Models\Pool;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Rats\Zkteco\Lib\ZKTeco;

class MachineSyncService
{
    /**
     * Memeriksa koneksi fisik/jaringan ke perangkat mesin absensi.
     *
     * @param Mesin $mesin
     * @return array
     */
    public function checkConnection(Mesin $mesin): array
    {
        if (!extension_loaded('sockets') && !function_exists('socket_create')) {
            $iniPath = php_ini_loaded_file() ?: 'php.ini';
            return [
                'success' => false,
                'type'    => 'danger',
                'message' => 'Ekstensi PHP sockets belum aktif di server. File konfigurasi aktif: ' . $iniPath . '. Pastikan extension=sockets aktif pada file tersebut dan server telah di-restart.',
            ];
        }

        if (empty($mesin->ip) || empty($mesin->port)) {
            return [
                'success' => false,
                'type'    => 'danger',
                'message' => 'Alamat IP atau Port mesin absensi belum dikonfigurasi.',
            ];
        }

        try {
            $zk = new ZKTeco($mesin->ip, (int) $mesin->port);
            if (!empty($zk->_zkclient)) {
                @socket_set_option($zk->_zkclient, SOL_SOCKET, SO_RCVTIMEO, ['sec' => 3, 'usec' => 0]);
                @socket_set_option($zk->_zkclient, SOL_SOCKET, SO_SNDTIMEO, ['sec' => 3, 'usec' => 0]);
            }
            if ($zk->connect()) {
                $zk->disconnect();
                return [
                    'success' => true,
                    'type'    => 'success',
                    'message' => 'Mesin Terkoneksi (' . $mesin->ip . ':' . $mesin->port . ')',
                ];
            } else {
                return [
                    'success' => false,
                    'type'    => 'danger',
                    'message' => 'Gagal menghubungkan ke mesin absensi (' . $mesin->ip . ':' . $mesin->port . '). Pastikan perangkat menyala dan berada dalam satu jaringan.',
                ];
            }
        } catch (\Throwable $e) {
            return [
                'success' => false,
                'type'    => 'danger',
                'message' => 'Terjadi kendala saat memeriksa koneksi mesin: ' . $e->getMessage(),
            ];
        }
    }

    /**
     * Menyinkronkan data log presensi dari satu mesin absensi secara aman.
     *
     * @param Mesin $mesin
     * @param bool $dryRun Jika true, hanya simulasi hitung data baru tanpa menyimpan ke DB
     * @param bool $force  Jika true, abaikan lock file jika ada
     * @return array
     */
    public function syncMachine(Mesin $mesin, bool $dryRun = false, bool $force = false): array
    {
        // 1. Validasi ekstensi PHP Sockets
        if (!extension_loaded('sockets') && !function_exists('socket_create')) {
            $iniPath = php_ini_loaded_file() ?: 'php.ini';
            return [
                'success'     => false,
                'type'        => 'danger',
                'new_records' => 0,
                'message'     => 'Ekstensi PHP sockets belum aktif di server. File konfigurasi aktif: ' . $iniPath,
            ];
        }

        // 2. Validasi konfigurasi mesin
        if ($mesin->tipe !== 'ip') {
            return [
                'success'     => false,
                'type'        => 'warning',
                'new_records' => 0,
                'message'     => 'Mesin ini bertipe ' . strtoupper($mesin->tipe) . ', hanya mesin bertipe IP yang dapat disinkronkan via jaringan.',
            ];
        }

        if (empty($mesin->ip) || empty($mesin->port)) {
            return [
                'success'     => false,
                'type'        => 'danger',
                'new_records' => 0,
                'message'     => 'Alamat IP atau Port mesin absensi belum dikonfigurasi dengan benar.',
            ];
        }

        // 3. Mekanisme Kunci Atomic File-Lock (Mencegah sinkronisasi bersamaan / overlapping)
        $lockDir = storage_path('framework/locks');
        if (!is_dir($lockDir)) {
            @mkdir($lockDir, 0777, true);
        }
        $lockFile = $lockDir . '/machine_sync_' . $mesin->id . '.lock';
        $fp = fopen($lockFile, 'c+');

        if (!$fp) {
            return [
                'success'     => false,
                'type'        => 'danger',
                'new_records' => 0,
                'message'     => 'Gagal membuat file lock sinkronisasi.',
            ];
        }

        if (!$force && !flock($fp, LOCK_EX | LOCK_NB)) {
            fclose($fp);
            return [
                'success'     => false,
                'type'        => 'warning',
                'new_records' => 0,
                'message'     => 'Mesin (' . $mesin->name . ') sedang disinkronkan oleh proses lain. Melewati proses ini untuk mencegah duplikasi.',
            ];
        }

        try {
            // 4. Koneksi ke socket ZKTeco
            try {
                $zk = new ZKTeco($mesin->ip, (int) $mesin->port);
                if (!empty($zk->_zkclient)) {
                    @socket_set_option($zk->_zkclient, SOL_SOCKET, SO_RCVTIMEO, ['sec' => 3, 'usec' => 0]);
                    @socket_set_option($zk->_zkclient, SOL_SOCKET, SO_SNDTIMEO, ['sec' => 3, 'usec' => 0]);
                }
                if (!$zk->connect()) {
                    return [
                        'success'     => false,
                        'type'        => 'danger',
                        'new_records' => 0,
                        'message'     => 'Gagal menghubungkan ke mesin absensi (' . $mesin->ip . ':' . $mesin->port . '). Pastikan perangkat menyala dan berada dalam satu jaringan.',
                    ];
                }

                try {
                    $rows = $zk->getAttendance();
                } finally {
                    $zk->disconnect();
                }
            } catch (\Throwable $e) {
                return [
                    'success'     => false,
                    'type'        => 'danger',
                    'new_records' => 0,
                    'message'     => 'Terjadi kendala saat berkomunikasi dengan mesin absensi: ' . $e->getMessage(),
                ];
            }

            if (empty($rows)) {
                return [
                    'success'     => true,
                    'type'        => 'info',
                    'new_records' => 0,
                    'message'     => 'Mesin terhubung (' . $mesin->ip . '), namun tidak ada data log absensi di perangkat.',
                ];
            }

            // 5. Tentukan Model Penampung: Grup 7 (Akademik -> Akapool), selain itu Pool
            $modelClass = ($mesin->grup == 7) ? Akapool::class : Pool::class;

            // 6. Tentukan cutoff timestamp terakhir untuk mesin ini (Cegah penarikan ulang data lama)
            $lastTs = $modelClass::where('mesin_id', $mesin->id)->max('timestamp');
            $cutoff = $lastTs ? Carbon::parse($lastTs) : Carbon::create(1970, 1, 1, 0, 0, 0);

            $now = now()->toDateTimeString();
            $buffer = [];
            $seen = [];

            // 7. Filter data baru & cegah duplikasi payload
            foreach ($rows as $r) {
                if (!isset($r['timestamp'], $r['id'])) {
                    continue;
                }

                try {
                    $ts = Carbon::parse($r['timestamp']);
                } catch (\Throwable $e) {
                    continue;
                }

                if ($ts->lessThanOrEqualTo($cutoff)) {
                    continue;
                }

                $record = [
                    'uid'        => isset($r['uid']) ? $r['uid'] : 0,
                    'iduser'     => $r['id'],
                    'state'      => isset($r['state']) ? (int) $r['state'] : 0,
                    'year'       => $ts->format('Y'),
                    'month'      => $ts->format('m'),
                    'date'       => $ts->toDateString(),
                    'time'       => $ts->toTimeString(),
                    'timestamp'  => $ts->toDateTimeString(),
                    'type'       => isset($r['type']) ? (int) $r['type'] : 0,
                    'mesin_id'   => $mesin->id,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];

                // Kunci komposit unik: mesin + iduser + timestamp + tipe absen
                $k = $mesin->id . '|' . $record['iduser'] . '|' . $record['timestamp'] . '|' . $record['type'];
                if (isset($seen[$k])) {
                    continue;
                }
                $seen[$k] = true;

                $buffer[] = $record;
            }

            if (empty($buffer)) {
                return [
                    'success'     => true,
                    'type'        => 'info',
                    'new_records' => 0,
                    'message'     => 'Mesin terhubung (' . $mesin->ip . '), data sudah yang terbaru (tidak ada rekaman baru setelah ' . ($lastTs ?? 'awal') . ').',
                ];
            }

            // Mode Dry Run (Hanya simulasi tanpa mengubah database)
            if ($dryRun) {
                return [
                    'success'     => true,
                    'type'        => 'info',
                    'dry_run'     => true,
                    'new_records' => count($buffer),
                    'message'     => '[DRY-RUN] Terdeteksi ' . count($buffer) . ' data log presensi baru yang siap disimpan (tidak ada data yang diubah).',
                ];
            }

            // 8. Simpan ke database dalam Transaksi Aman (Chunked Insert)
            DB::beginTransaction();
            try {
                foreach (array_chunk($buffer, 1000) as $chunk) {
                    $modelClass::insert($chunk);
                }

                $latest = $modelClass::where('mesin_id', $mesin->id)->max('timestamp');
                if ($latest) {
                    $mesin->last_sync = $latest;
                    $mesin->save();
                }

                DB::commit();
                $count = count($buffer);
                return [
                    'success'     => true,
                    'type'        => 'success',
                    'new_records' => $count,
                    'message'     => 'Sinkronisasi berhasil! Sebanyak ' . $count . ' data presensi baru berhasil disimpan ke sistem.',
                    'last_sync'   => $latest,
                ];
            } catch (\Throwable $e) {
                DB::rollBack();
                Log::error("MachineSyncService error pada mesin {$mesin->id}: " . $e->getMessage(), ['exception' => $e]);
                return [
                    'success'     => false,
                    'type'        => 'danger',
                    'new_records' => 0,
                    'message'     => 'Gagal menyimpan data hasil sinkronisasi ke database: ' . $e->getMessage(),
                ];
            }
        } finally {
            // Selalu lepaskan file lock
            flock($fp, LOCK_UN);
            fclose($fp);
        }
    }

    /**
     * Menyinkronkan seluruh mesin absensi bertipe IP.
     *
     * @param bool $dryRun
     * @param bool $force
     * @param int|null $grup Filter grup mesin (misal 6 untuk TU, 7 untuk Akademik)
     * @return array
     */
    public function syncAll(bool $dryRun = false, bool $force = false, ?int $grup = null): array
    {
        $query = Mesin::where('tipe', 'ip');
        if ($grup !== null) {
            $query->where('grup', $grup);
        }
        $machines = $query->get();

        $totalMachines = $machines->count();
        $successCount = 0;
        $failCount = 0;
        $totalNewRecords = 0;
        $details = [];

        foreach ($machines as $m) {
            $res = $this->syncMachine($m, $dryRun, $force);
            if ($res['success']) {
                $successCount++;
                $totalNewRecords += $res['new_records'] ?? 0;
            } else {
                $failCount++;
            }
            $details[$m->id] = [
                'name'        => $m->name,
                'ip'          => $m->ip . ':' . $m->port,
                'status'      => $res['success'] ? 'SUCCESS' : 'FAILED',
                'type'        => $res['type'] ?? 'info',
                'new_records' => $res['new_records'] ?? 0,
                'message'     => $res['message'] ?? '',
            ];
        }

        return [
            'total_machines'    => $totalMachines,
            'success_count'     => $successCount,
            'fail_count'        => $failCount,
            'total_new_records' => $totalNewRecords,
            'details'           => $details,
        ];
    }
}
