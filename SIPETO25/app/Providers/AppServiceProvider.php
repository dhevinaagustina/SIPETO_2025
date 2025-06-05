<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;

use Carbon\Carbon;

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

        // Force HTTPS saat menggunakan ngrok
        if (request()->header('x-forwarded-proto') === 'https') {
            URL::forceScheme('https');
        }
        
        // Gunakan Bootstrap untuk pagination
        Paginator::useBootstrap();

            View::composer('*', function ($view) {
            $user = Auth::user();
            $isSuperAdmin = $user && $user->role === 'super_admin';
            $view->with('isSuperAdmin', $isSuperAdmin);
        });
    }
}