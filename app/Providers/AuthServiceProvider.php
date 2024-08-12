<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        Gate::define('isAdmin', function ($user) {
            return $user->role == 'admin';
        });
        Gate::define('isLaboran', function ($user) {
            return $user->role == 'laboran';
        });
        Gate::define('isDokter', function ($user) {
            return $user->role == 'dokter';
        });
        Gate::define('isApoteker', function ($user) {
            return $user->role == 'apoteker';
        });
        Gate::define('isPasien', function ($user) {
            return $user->role == 'pasien';
        });
    }

    
}
