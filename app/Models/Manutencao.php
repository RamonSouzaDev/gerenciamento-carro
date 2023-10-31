<?php

namespace App\Models;

use App\Models\Veiculo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Manutencao extends Model
{
    use HasFactory;

    protected $table = 'manutencoes';

    protected $fillable = [
        'veiculo_id',
        'status',
        'data_inicio',
        'data_fim',
        'descricao',
        'comentarios',
        'valor_estimado',
        'valor_final'
    ];

    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class, 'veiculo_id');
    }

    public function faturamento()
    {
        return $this->hasOne(Faturamento::class);
    }

    public function getValorEstimado()
    {
        $servicos = $this->servicos;
        $valorEstimado = 0;

        foreach ($servicos as $servico) {
            $valorEstimado += $servico->valor;
        }

        return $valorEstimado;
    }

    public function getValorFinal()
    {
        return $this->valor_final;
    }
}
