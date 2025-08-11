<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('ultraman', function ($user){
            return $user->hasAnyRole('ultraman');
        });
        Gate::define('user', function ($user){
            return $user->hasAnyRoles(['User','Ultraman']);
        });
        Gate::define('umum', function ($user){
            return $user->hasAnyRoles(['Umum','Ultraman']);
        });
         Gate::define('akademik', function ($user){
            return $user->hasAnyRoles(['Akademik','Ultraman']);
        });


    }
}
