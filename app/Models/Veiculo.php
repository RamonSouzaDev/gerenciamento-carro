<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $fillable = [
        'placa',
        'modelo',
        'marca',
        'ano',
    ];

    public function getAnoModeloAttribute()
    {
        return $this->ano . ' - ' . $this->modelo;
    }
}
