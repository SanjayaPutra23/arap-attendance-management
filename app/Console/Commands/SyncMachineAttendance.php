<?php

namespace App\Console\Commands;

use App\Models\Mesin;
use App\Services\MachineSyncService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SyncMachineAttendance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'arap:sync-machine 
                            {--id= : ID mesin tertentu yang ingin disinkronkan} 
                            {--grup= : Filter grup mesin (misal 6 untuk TU/Relawan, 7 untuk Akademik)} 
                            {--dry-run : Jalankan simulasi pemeriksaan data baru tanpa menyimpan ke database} 
                            {--force : Abaikan status file lock jika proses sebelumnya macet}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi log presensi dari mesin absensi biometrik ZKTeco ke database ARAP';

    /**
     * Execute the console command.
     *
     * @param MachineSyncService $syncService
     * @return int
     */
    public function handle(MachineSyncService $syncService)
    {
        $id = $this->option('id');
        $grup = $this->option('grup') ? (int) $this->option('grup') : null;
        $dryRun = (bool) $this->option('dry-run');
        $force = (bool) $this->option('force');

        $this->info("=================================================================");
        $this->info("          ARAP - SINKRONISASI MESIN PRESENSI BIOMETRIK           ");
        $this->info("=================================================================");

        if ($dryRun) {
            $this->warn("MODE: DRY-RUN (Simulasi saja, tidak ada data yang disimpan ke database)\n");
        }

        // Jika user menspesifikasikan ID mesin tertentu
        if ($id) {
            $mesin = Mesin::find($id);
            if (!$mesin) {
                $this->error("Mesin dengan ID {$id} tidak ditemukan.");
                return 1;
            }

            $this->line("Memproses Mesin: <fg=cyan>{$mesin->name}</> ({$mesin->ip}:{$mesin->port})");
            $res = $syncService->syncMachine($mesin, $dryRun, $force);

            if ($res['success']) {
                $this->info("STATUS : BERHASIL");
                $this->line("REKAMAN BARU: <fg=green>" . ($res['new_records'] ?? 0) . "</>");
                $this->line("PESAN  : {$res['message']}");
                Log::info("Artisan arap:sync-machine sukses untuk mesin {$mesin->id} ({$mesin->name}): " . $res['message']);
                return 0;
            } else {
                $this->error("STATUS : GAGAL");
                $this->line("PESAN  : {$res['message']}");
                Log::warning("Artisan arap:sync-machine gagal untuk mesin {$mesin->id} ({$mesin->name}): " . $res['message']);
                return 1;
            }
        }

        // Sinkronisasi seluruh mesin IP aktif
        $this->line("Memeriksa seluruh mesin absensi bertipe IP...");
        $result = $syncService->syncAll($dryRun, $force, $grup);

        $tableData = [];
        foreach ($result['details'] as $mId => $d) {
            $statusColor = $d['status'] === 'SUCCESS' ? 'green' : 'red';
            $tableData[] = [
                $mId,
                $d['name'],
                $d['ip'],
                "<fg={$statusColor}>{$d['status']}</>",
                $d['new_records'],
                \Illuminate\Support\Str::limit($d['message'], 60),
            ];
        }

        $this->table(
            ['ID', 'Nama Mesin', 'IP:Port', 'Status', 'Data Baru', 'Keterangan'],
            $tableData
        );

        $this->line("-----------------------------------------------------------------");
        $this->line("Total Mesin Diperiksa : " . $result['total_machines']);
        $this->info("Mesin Berhasil         : " . $result['success_count']);
        if ($result['fail_count'] > 0) {
            $this->warn("Mesin Offline / Gagal  : " . $result['fail_count']);
        }
        $this->line("Total Log Baru Disimpan: <fg=green>" . $result['total_new_records'] . "</>");
        $this->info("=================================================================\n");

        Log::info("Artisan arap:sync-machine selesai. Total mesin: {$result['total_machines']}, Berhasil: {$result['success_count']}, Gagal: {$result['fail_count']}, Data baru: {$result['total_new_records']}");

        return 0;
    }
}
