<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use App\Models\Kontak; // Pastikan model Kontak sesuai (atau sesuaikan dengan nama model tabel kontaks kamu)

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
        // Paksa HTTPS jika di production
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        // Menyediakan variabel $kontakFooter secara otomatis ke semua view / halaman
        View::composer('*', function ($view) {
            $view->with('kontakFooter', Kontak::first());
        });
    }
}