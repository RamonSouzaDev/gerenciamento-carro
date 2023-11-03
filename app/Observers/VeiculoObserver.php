<?php

namespace App\Observers;

use App\Models\Veiculo;
use Illuminate\Support\Facades\Auth;

class VeiculoObserver
{
    /**
     * Manipula o evento de criação de um Veículo.
     *
     * @param  Veiculo  $veiculo
     * @return void
     */
    public function creating(Veiculo $veiculo): void
    {
        $veiculo->user_id = Auth::id();
    }
}
