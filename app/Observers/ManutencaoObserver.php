<?php

namespace App\Observers;

use App\Models\Manutencao;
use App\Jobs\EnviarEmailNotificacaoManutencao;

class ManutencaoObserver
{
    public function creating(Manutencao $manutencao)
    {
        dispatch(new EnviarEmailNotificacaoManutencao($manutencao));
    }
}
