<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faturamento extends Model
{
    use HasFactory;

    protected $table = 'faturamento';

    protected $fillable = [
        'manutencao_id',
        'valor',
        'descricao',
        'status',
    ];

    public function manutencao()
    {
        return $this->belongsTo(Manutencao::class);
    }
}
