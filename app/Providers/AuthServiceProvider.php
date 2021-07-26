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
        Gate::before(function ($admin) {
            if ($admin->isAdmin()) {
                return true;
            }
            return false;
        });
        Gate::define('posts.manage', function ($admin) {
            if ($admin->isEditor()) {
                return true;
            }
            if ($admin->isModerator()) {
                return true;
            }
            return false;
        });
        Gate::define('posts.index', function ($admin) {
            if ($admin->isEditor()) {
                return true;
            }
            return false;
        });
        Gate::define('posts.create', function ($admin) {
            if ($admin->isEditor()) {
                return true;
            }
            return false;
        });
        Gate::define('posts.update', function ($admin) {
            if ($admin->isEditor()) {
                return true;
            }
            return false;
        });
        Gate::define('posts.delete', function ($admin) {
            if ($admin->isEditor()) {
                return true;
            }
            return false;
        });
    }
}
