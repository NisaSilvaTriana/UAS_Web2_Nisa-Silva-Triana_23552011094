<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
        // Memaksa HTTPS otomatis ketika aplikasi berjalan di lingkungan online/production
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}