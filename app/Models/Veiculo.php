<?php

namespace App\Models;

use App\Enums\VeiculoStatus;
use Illuminate\Database\Eloquent\Model;

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

}
