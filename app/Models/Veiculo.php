<?php

namespace App\Models;

use App\Models\Manutencao;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Veiculo extends Model
{
    protected $fillable = [
        'placa',
        'modelo',
        'marca',
        'ano',
        'status'
    ];

    public function getAnoModeloAttribute()
    {
        return $this->ano . ' - ' . $this->modelo;
    }

    /**
     * @return HasMany
     */
    public function manutencoes(): HasMany
    {
        return $this->hasMany(Manutencao::class, 'veiculo_id', 'id');
    }

}
