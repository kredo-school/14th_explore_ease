<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Enums\UserTypeEnum;
use App\Models\User;

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
        // Admin user login [ @can('admin') ]
        Gate::define('admin', function(User $user) {
            if ($user->profile != null) {
                return ($user->profile->usertype_id === UserTypeEnum::Admin->value);
            }
            return false;
        });

        // Normal user login [ @can('user') ]
        Gate::define('user', function(User $user) {
            if ($user->profile != null) {
                return ($user->profile->usertype_id === UserTypeEnum::User->value);
            }
            return false;
        });

        // Owner user login [ @can('owner') ]
        Gate::define('owner', function(User $user) {
            if ($user->profile != null) {
                return ($user->profile->usertype_id === UserTypeEnum::Owner->value);
            }
            return false;
        });

        // No profile user login [ @can('no_profile') ]
        Gate::define('no_profile', function(User $user) {
            return ($user->profile == null);
        });
    }
}
