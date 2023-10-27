<?php

namespace App\Observers;

use App\Models\Veiculo;
use Illuminate\Support\Facades\Auth;

class VeiculoObserver
{
    public function creating(Veiculo $veiculo)
    {
        $veiculo->user_id = Auth::id();
    }
}
