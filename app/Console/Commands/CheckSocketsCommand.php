<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CheckSocketsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'arap:check-sockets {--fix : Otomatis mengaktifkan extension=sockets pada php.ini yang aktif}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Periksa status ekstensi PHP sockets dan lokasi php.ini untuk modul mesin absensi ZKTeco';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('========================================================');
        $this->info('  ARAP - Pemeriksaan Ekstensi PHP Sockets (ZKTeco)      ');
        $this->info('========================================================');

        $loadedIni = php_ini_loaded_file();
        $isLoaded = extension_loaded('sockets');
        $funcExists = function_exists('socket_create');

        $this->line('Versi PHP           : <comment>' . PHP_VERSION . '</comment>');
        $this->line('File php.ini Aktif  : <comment>' . ($loadedIni ?: 'Tidak ditemukan') . '</comment>');
        $this->line('Status Modul sockets: ' . ($isLoaded ? '<info>[AKTIF]</info>' : '<error>[NONAKTIF]</error>'));
        $this->line('Fungsi socket_create: ' . ($funcExists ? '<info>[TERSEDIA]</info>' : '<error>[TIDAK TERSEDIA]</error>'));
        $this->newLine();

        if ($isLoaded || $funcExists) {
            $this->info('[OK] Ekstensi sockets aktif dan siap digunakan untuk fitur Check Koneksi & Sinkronkan Data.');
            return 0;
        }

        $this->error('[PERHATIAN] Ekstensi sockets belum aktif pada PHP ini.');
        $this->line('Fitur Check Koneksi dan Sinkronkan Data ZKTeco memerlukan ekstensi ini.');

        if (!$loadedIni || !file_exists($loadedIni)) {
            $this->error('File php.ini aktif tidak dapat dideteksi secara otomatis.');
            return 1;
        }

        if ($this->option('fix')) {
            $content = file_get_contents($loadedIni);

            if (preg_match('/^\s*;extension\s*=\s*sockets\s*$/m', $content)) {
                $newContent = preg_replace('/^\s*;extension\s*=\s*sockets\s*$/m', "extension=sockets", $content, 1);
                file_put_contents($loadedIni, $newContent);

                $this->info('[BERHASIL] extension=sockets telah diaktifkan pada: ' . $loadedIni);
                $this->warn('PENTING: Anda harus me-restart web server atau terminal (php artisan serve / Apache Laragon) agar perubahan diterapkan.');
                return 0;
            } elseif (preg_match('/^\s*;extension\s*=\s*php_sockets\.dll\s*$/m', $content)) {
                $newContent = preg_replace('/^\s*;extension\s*=\s*php_sockets\.dll\s*$/m', "extension=php_sockets.dll", $content, 1);
                file_put_contents($loadedIni, $newContent);

                $this->info('[BERHASIL] extension=php_sockets.dll telah diaktifkan pada: ' . $loadedIni);
                $this->warn('PENTING: Anda harus me-restart web server atau terminal (php artisan serve / Apache Laragon) agar perubahan diterapkan.');
                return 0;
            } else {
                $this->warn('Pola ";extension=sockets" tidak ditemukan dalam bentuk komentar.');
                $this->line('Silakan tambahkan baris "extension=sockets" secara manual di dalam: ' . $loadedIni);
                return 1;
            }
        } else {
            $this->line('Untuk mengaktifkan secara otomatis, jalankan:');
            $this->comment('  php artisan arap:check-sockets --fix');
            $this->newLine();
            $this->line('Atau aktifkan secara manual:');
            $this->line('  1. Buka file: ' . $loadedIni);
            $this->line('  2. Cari baris ";extension=sockets" dan hapus tanda titik koma (;) menjadi "extension=sockets"');
            $this->line('  3. Simpan file, lalu restart server (Stop & Start di Laragon atau restart php artisan serve).');
            return 1;
        }
    }
}
