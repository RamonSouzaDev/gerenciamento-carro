<?php

namespace App\Providers;

use App\Models\Veiculo;
use App\Models\Manutencao;
use App\Observers\VeiculoObserver;
use App\Observers\ManutencaoObserver;
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
        Manutencao::observe(ManutencaoObserver::class);
    }
}
