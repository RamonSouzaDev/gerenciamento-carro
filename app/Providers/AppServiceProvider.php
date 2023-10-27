<?php

namespace App\Providers;

use App\Models\Veiculo;
use App\Observers\VeiculoObserver;
use Illuminate\Support\ServiceProvider;

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
    public function boot()
    {
        Veiculo::observe(VeiculoObserver::class);
    }
}
