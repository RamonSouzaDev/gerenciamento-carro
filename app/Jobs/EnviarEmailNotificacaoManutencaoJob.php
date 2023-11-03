<?php

namespace App\Jobs;

use App\Models\Manutencao;
use Illuminate\Bus\Queueable;
use App\Mail\ManutencaoCriada;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class EnviarEmailNotificacaoManutencaoJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $manutencao;

    public function __construct(Manutencao $manutencao)
    {
        $this->manutencao = $manutencao;
    }

    public function handle()
    {
        // Envia o e-mail
        Mail::to('dwmom@hotmail.com')
            ->send(new ManutencaoCriada($this->manutencao));
    }
}
