<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\ResourceRegistrar;

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
        // $registrar = new \App\Routing\ResourceRegistrar($this->app['router']);

        // $this->app->bind('Illuminate\Routing\ResourceRegistrar', function () use ($registrar) {
        //     return $registrar;
        // });
    }
}
