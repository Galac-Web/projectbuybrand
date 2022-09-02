<?php

namespace App\Providers;

use App\Models\User;
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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    public function boot()
    {
        $this->registerPolicies();

        if (env('SUPER_USERS_ENABLE', false)) {
            Gate::before(function (User $user): ?bool {
                $superusers = explode(',', env('SUPER_USERS'));

                return in_array($user->id, $superusers) ? true : null;
            });
        }

        // Dashboard access
        Gate::define('dashboard', function (User $user) {
            return $user->id === 1;
        });
    }
}
