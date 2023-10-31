<?php

namespace App\Listeners;

use App\Mail\ManutencaoCriada;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Events\Dispatcher;

class ManutencaoListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ManutencaoCriada $event)
    {
        $manutencao = $event->manutencao;

        Mail::to($manutencao->mecanico->email)->send(new ManutencaoCriada($manutencao));
    }
}
