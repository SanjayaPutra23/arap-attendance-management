<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
        // RBAC Gates compatible with legacy and v2 requirements
        Gate::define('ultraman', function (User $user) {
            return $user->hasAnyRoles(['Ultraman', 'ultraman']);
        });

        Gate::define('umum', function (User $user) {
            return $user->hasAnyRoles(['Umum', 'Ultraman']);
        });

        Gate::define('staff-access', function (User $user) {
            return $user->hasAnyRoles(['Umum', 'Akademik', 'Ultraman', 'Officer', 'Tata Usaha']);
        });

        Gate::define('user', function (User $user) {
            return $user->hasAnyRoles(['User', 'Ultraman', 'Umum', 'Officer', 'Tata Usaha', 'Relawan']);
        });
    }
}
