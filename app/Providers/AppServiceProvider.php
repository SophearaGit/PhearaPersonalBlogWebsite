<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Session;

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
        // Redirect an authenticated user to dashboard
        RedirectIfAuthenticated::redirectUsing(redirectToCallback: function () {
            return route('admin.dashboard');
        });

        // Redirect an unauthenticated user to login page
        Authenticate::redirectUsing(redirectToCallback: function () {
            // redirect to login page and show session flash message
            Session::flash('fail', 'Please login to access the admin area.');
            return route('admin.login');
        });





    }
}
