<?php

namespace App\Providers;

use App\Console\Kernel;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Explicitly binding Kernel class if needed
        $this->app->singleton(Kernel::class, function ($app) {
            return new Kernel($app, $app['events']);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
