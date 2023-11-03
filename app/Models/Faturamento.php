<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    /**
     * @return BelongsTo
     */
    public function manutencao(): BelongsTo
    {
        return $this->belongsTo(Manutencao::class);
    }
}
