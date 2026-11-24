<?php

namespace App\Providers;

use App\Models\User;
use App\Services\ZKTeco\ZKTecoClient;
use App\Services\ZKTeco\ZKTecoClientInterface;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ZKTecoClientInterface::class, ZKTecoClient::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Gunakan styling pagination Bootstrap 5 secara global
        Paginator::useBootstrapFive();

        // Force HTTPS in production when configured
        if (config('app.force_https', false)) {
            URL::forceScheme('https');
        }

        // RBAC Gates pasca-cleanup peran (Ultraman, Officer, User)
        Gate::define('ultraman', function (User $user) {
            return $user->hasAnyRoles(['Ultraman']);
        });

        // Gate 'umum' dipertahankan sebagai alias internal untuk Admin Utama (Ultraman)
        Gate::define('umum', function (User $user) {
            return $user->hasAnyRoles(['Ultraman']);
        });

        Gate::define('staff-access', function (User $user) {
            return $user->hasAnyRoles(['Ultraman', 'Officer']);
        });

        Gate::define('user', function (User $user) {
            return $user->hasAnyRoles(['User', 'Officer', 'Ultraman']);
        });
    }
}
