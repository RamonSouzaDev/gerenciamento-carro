<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Manutencao;
use Illuminate\Console\Command;
use App\Enums\ManutencaoStatusEnum;

class ListarManutencoesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'manutencoes:listar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Lista todas as manutenções';


    public function handle()
    {
        $manutencoes = Manutencao::all();

        $this->info('Lista de manutenções:');

        $this->table(['ID', 'Descrição', 'Data de Início', 'Data Final', 'Status', 'Placa do veículo'], $manutencoes->map(function ($manutencao) {
            return [
                $manutencao->id,
                $manutencao->descricao,
                Carbon::parse($manutencao->data_inicio)->format('d/m/Y'),
                Carbon::parse($manutencao->data_fim)->format('d/m/Y'),
                ManutencaoStatusEnum::getDescription($manutencao->status),
                $manutencao->veiculo->placa,
            ];
        }));
    }
}
