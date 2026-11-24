<?php

namespace App\Console\Commands;

use App\Models\Mesin;
use App\Services\MachineSyncService;
use Illuminate\Console\Command;

class SyncMachineAttendance extends Command
{
    /**
     * Nama dan signature perintah konsol.
     *
     * @var string
     */
    protected $signature = 'arap:sync-machine
                            {--mesin= : ID mesin tertentu yang akan disinkronkan}
                            {--force : Abaikan kunci file lock yang sedang aktif}';

    /**
     * Deskripsi perintah konsol.
     *
     * @var string
     */
    protected $description = 'Tarik dan sinkronkan data log presensi dari mesin fingerprint ZKTeco ke tabel pools';

    /**
     * Eksekusi perintah konsol.
     */
    public function handle(MachineSyncService $syncService): int
    {
        $mesinId = $this->option('mesin');
        $force = (bool) $this->option('force');

        if ($mesinId) {
            $mesin = Mesin::find($mesinId);
            if (! $mesin) {
                $this->error("Mesin dengan ID {$mesinId} tidak ditemukan.");

                return self::FAILURE;
            }

            $this->info("Memulai sinkronisasi mesin '{$mesin->name}' ({$mesin->ip}:{$mesin->port})...");
            $result = $syncService->syncMachine($mesin, $force);

            if ($result['success']) {
                $this->info($result['message']);
                $this->table(
                    ['Parameter', 'Nilai'],
                    [
                        ['Mesin', $mesin->name],
                        ['Data Ditarik', $result['fetched']],
                        ['Log Baru Disimpan', $result['inserted']],
                        ['Dilewati / Duplikat', $result['skipped']],
                    ]
                );

                return self::SUCCESS;
            } else {
                $this->error($result['message']);

                return self::FAILURE;
            }
        }

        $this->info('Memulai sinkronisasi seluruh mesin absensi bertipe IP...');
        $result = $syncService->syncAllIpMachines($force);

        $this->table(
            ['Total Mesin', 'Berhasil', 'Gagal', 'Total Baru', 'Total Dilewati'],
            [
                [
                    $result['total_machines'],
                    $result['success_count'],
                    $result['fail_count'],
                    $result['total_inserted'],
                    $result['total_skipped'],
                ],
            ]
        );

        foreach ($result['details'] as $detail) {
            if ($detail['success']) {
                $this->line("  [OK] {$detail['machine']}: {$detail['message']}");
            } else {
                $this->warn("  [FAIL] {$detail['machine']}: {$detail['message']}");
            }
        }

        return $result['fail_count'] === 0 ? self::SUCCESS : self::FAILURE;
    }
}
