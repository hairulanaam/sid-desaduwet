<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\InformasiDesa;
use Illuminate\Support\Facades\View;


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
        View::composer('layouts.footer', function ($view) {
            $informasidesas = InformasiDesa::first(); 
            $view->with('informasidesas', $informasidesas);
        });
    }
}
