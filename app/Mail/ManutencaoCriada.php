<?php

namespace App\Mail;

use App\Models\Manutencao;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ManutencaoCriada extends Mailable
{
    use Queueable, SerializesModels;

    public $manutencao;

    public function __construct(Manutencao $manutencao)
    {   
        $this->manutencao = $manutencao;
    }

    public function build()
    {
        // Configura o assunto do e-mail
        $this->subject('Manutenção criada');

        return $this->view('emails.manutencao-criada', ['manutencao' => $this->manutencao]);

    }
}
