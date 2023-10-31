<?php

namespace App\Enums;

use Illuminate\Validation\Rules\Enum;

final class FaturamentoStatusEnum extends Enum
{
    public const PENDENTE = 'pendente';
    public const CONCLUIDO = 'concluido';
    public const REPROVADO = 'reprovado';

    public static function getDescription($value): string
    {
        return match ($value) {
            self::PENDENTE => 'Faturamento em processamento',
            self::CONCLUIDO => 'Faturamento concluído',
            self::REPROVADO => 'Faturamento reprovado',
        };
    }

    public static function cases(): array
    {
        return array_keys(self::labels());
    }

    public static function labels(): array
    {
        return [
            self::PENDENTE => 'pendente',
            self::CONCLUIDO => 'concluido',
            self::REPROVADO => 'reprovado',
        ];
    }
}
