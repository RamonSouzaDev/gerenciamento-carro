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
    ];

    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class, 'veiculo_id');
    }
}
