<?php

namespace App\Console\Commands;

use App\Enums\FaturamentoStatusEnum;
use Exception;
use App\Models\Faturamento;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ListarFaturamentoPorIdCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:listar-faturamento-por-id {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $id = $this->argument('id');

        try {
            $faturamento = Faturamento::where('id',$id)->get();

            if (!$faturamento) {
                throw new Exception('Faturamento não encontrado.');
            }

            $this->table(['ID', 'Manutenção', 'Valor', 'Descrição', 'Status', 'Data de criação'], $faturamento->map(function ($faturamento) {
                return [
                    $faturamento->id,
                    $faturamento->manutencao?->descricao,
                    'R$ ' . $faturamento->valor,
                    $faturamento->descricao,
                    FaturamentoStatusEnum::getDescription($faturamento->status),
                    $faturamento->created_at
                ];
            }));
        } catch (Exception $e) {
            Log::error($e->getMessage());

            $this->error($e->getMessage());
        }
    }
}
