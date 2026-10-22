<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\Option;
use App\Models\User;
use App\Models\Peserta;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
        Fortify::registerView(function () {
            $type = Option::where('list','1')->get();
            return view('auth.register',['type'=> $type]);
        });
        Fortify::loginView(function (){
            return view('auth.login');
        });
        Fortify::resetPasswordView(function ($request){
            return view('auth.passwords.reset',['request'=> $request]);
        });
        Fortify::requestPasswordResetLinkView(function (){
            return view('auth.passwords.email');
        });

        // Autentikasi fleksibel: mendukung E-Mail (Admin/Staff) maupun UID / NIK (Relawan/Pegawai)
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

            // 2. Jika belum ditemukan, periksa apakah input cocok dengan UID/NIK di tabel pesertas
            if (!$user) {
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
            return Limit::perMinute(5)->by($request->email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
