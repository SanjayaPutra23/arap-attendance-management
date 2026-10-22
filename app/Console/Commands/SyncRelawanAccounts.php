<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Peserta;
use App\Models\Role;

class SyncRelawanAccounts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'arap:sync-relawan {--force-password : Reset existing relawan passwords to default NIK}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Menyinkronkan data Peserta (Relawan) ke tabel Users untuk login mandiri';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info("=== SINKRONISASI AKUN LOGIN RELAWAN ===");

        // 1. Pastikan kolom peserta_id dan nik ada di tabel users
        if (!Schema::hasColumn('users', 'peserta_id')) {
            Schema::table('users', function (Blueprint $table) {
                $table->unsignedBigInteger('peserta_id')->nullable()->after('id');
            });
            $this->info("Kolom 'peserta_id' berhasil ditambahkan ke tabel users.");
        }

        if (!Schema::hasColumn('users', 'nik')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('nik', 50)->nullable()->unique()->after('email');
            });
            $this->info("Kolom 'nik' berhasil ditambahkan ke tabel users.");
        }

        // 2. Ambil role User (ID 4)
        $roleUser = Role::where('name', 'User')->first();
        if (!$roleUser) {
            $roleUser = Role::create(['name' => 'User']);
            $this->info("Role 'User' berhasil dibuat.");
        }

        // 3. Ambil seluruh data peserta
        $pesertas = Peserta::all();
        $this->info("Total Peserta / Relawan ditemukan: " . $pesertas->count());

        $createdCount = 0;
        $updatedCount = 0;
        $skippedCount = 0;

        foreach ($pesertas as $peserta) {
            $nik = trim((string) $peserta->nik);
            if (empty($nik)) {
                $this->warn("Peserta ID {$peserta->id} ({$peserta->name}) dilewati karena NIK kosong.");
                $skippedCount++;
                continue;
            }

            // Cari user berdasarkan peserta_id atau nik atau email
            $user = User::where('peserta_id', $peserta->id)
                ->orWhere('nik', $nik)
                ->orWhere('email', "{$nik}@arap.local")
                ->first();

            $isNew = false;
            if (!$user) {
                $user = new User();
                $isNew = true;
            }

            $user->name = $peserta->name;
            $user->email = "{$nik}@arap.local";
            $user->nik = $nik;
            $user->peserta_id = $peserta->id;
            $user->telp = $peserta->telp;

            // Password hanya diset jika user baru atau opsi --force-password aktif
            if ($isNew || $this->option('force-password')) {
                $user->password = Hash::make($nik);
            }

            if (empty($user->avatar)) {
                $user->avatar = 'default.png';
            }

            $user->save();

            // Pasang role 'User' jika belum terpasang
            if (!$user->roles()->where('roles.id', $roleUser->id)->exists()) {
                $user->roles()->attach($roleUser->id);
            }

            if ($isNew) {
                $createdCount++;
            } else {
                $updatedCount++;
            }
        }

        $this->info("--- Ringkasan Sinkronisasi ---");
        $this->info("Akun baru dibuat       : {$createdCount}");
        $this->info("Akun diperbarui        : {$updatedCount}");
        $this->info("Dilewati               : {$skippedCount}");
        $this->info("Total Akun User saat ini : " . User::count());
        $this->info("Sinkronisasi akun relawan selesai dengan sukses.");

        return Command::SUCCESS;
    }
}
