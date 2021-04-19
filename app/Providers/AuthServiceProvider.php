<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use LdapRecord\Laravel\Middleware\WindowsAuthenticate;

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

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        WindowsAuthenticate::rememberAuthenticatedUsers();
        WindowsAuthenticate::serverKey('REMOTE_USER');
        WindowsAuthenticate::logoutUnauthenticatedUsers();
        //

       // Implicitly grant "Super Admin" role all permission checks using can()
        Gate::before(function ($user, $ability) {
        if ($user->hasRole('Super-Admin')) {
        return true;
        }
     });
    }
    
}
