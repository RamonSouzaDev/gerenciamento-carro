<?php

namespace App\Enums;

use Illuminate\Validation\Rules\Enum;

final class ManutencaoStatusEnum extends Enum
{
    public const PENDENTE = 'pendente';
    public const CONCLUIDA = 'concluída';
    public const REPROVADA = 'reprovada';

    public static function getDescription($value): string
    {
        return match ($value) {
            self::PENDENTE => 'Manutenção em andamento',
            self::CONCLUIDA => 'Manutenção concluída',
            self::REPROVADA => 'Manutenção reprovada',
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
            self::CONCLUIDA => 'concluida',
            self::REPROVADA => 'reprovada',
        ];
    }
}
