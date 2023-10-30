<?php

namespace App\Providers;

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
    }

    public function register()
    {
        // ...
    }
}
