<?php

namespace App\Providers;

use App\Models\Peserta;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::loginView(function () {
            return view('auth.login');
        });

        // Autentikasi fleksibel: mendukung Email maupun NIK (Relawan / Pegawai)
        Fortify::authenticateUsing(function (Request $request) {
            $login = trim((string) $request->input('email'));
            $password = (string) $request->input('password');

            if ($login === '' || $password === '') {
                return null;
            }

            // 1. Cari langsung kecocokan pada email atau nik di tabel users
            $user = User::where('email', $login)
                ->orWhere('nik', $login)
                ->first();

            // 2. Jika belum ditemukan dan model Peserta ada, cari via relasi peserta
            if (! $user && class_exists(Peserta::class)) {
                $peserta = Peserta::where('nik', $login)
                    ->orWhere('uid', $login)
                    ->first();
                if ($peserta) {
                    $user = User::where('peserta_id', $peserta->id)->first();
                }
            }

            if ($user && Hash::check($password, $user->password)) {
                return $user;
            }

            return null;
        });

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input('email')).'|'.$request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });
    }
}
