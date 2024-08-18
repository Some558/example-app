<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\PokeApiService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(PokeApiService::class, function ($app) {
            return new PokeApiService();
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
