<?php

namespace App\Providers;

use App\Models\Manutencao;
use App\Models\Veiculo;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer([
            'manutencoes.create',
            'manutencoes.edit'
        ], function ($view) {
            $veiculos = Veiculo::all(); // Carrega todos os veículos
            $view->with('veiculos', $veiculos);
        });

        View::composer([
            'faturamentos.create'
        ], function ($view) {
            $manutencoes = Manutencao::all();
            $view->with('manutencoes', $manutencoes);
        });
    }

    public function register()
    {
        // ...
    }
}
