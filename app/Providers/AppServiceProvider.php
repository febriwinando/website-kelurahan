<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;


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
        Paginator::useBootstrapFive();

        // Blade::if('admin', function () {
        //     return auth()->check() && auth()->user()->level === 'administrator';
        // });

        // Blade::if('userrole', function () {
        //     return auth()->check() && auth()->user()->level === 'user';
        // });

        // Blade::if('verifikator', function () {
        //     return auth()->check() && auth()->user()->level === 'verifikator';
        // });

        Blade::if('role', function (...$roles) {
            return auth()->check() && in_array(auth()->user()->level, $roles);
        });

    }
}
