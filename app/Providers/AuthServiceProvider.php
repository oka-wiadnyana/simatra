<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
        Gate::define('is-admin', function (User $user) {
            return in_array($user->role,[
                'super_admin',
                'ketua',
                'wakil_ketua',
                'panitera',
                'panmud_hukum',
                'panmud_pidana',
                'panmud_perdata',
                'panmud_tipikor',
                'admin_hukum',
                'admin_perdata',
                'admin_pidana',
                'admin_tipikor',
            ]);
        });

        Gate::define('is-satker', function (User $user) {
            return $user->role=='satker';
        });
    }
}
