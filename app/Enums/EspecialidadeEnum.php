<?php

namespace App\Enums;

use Illuminate\Validation\Rules\Enum;

final class EspecialidadeEnum extends Enum
{
    public const MECANICA_GERAL = 'Mecânica Geral';
    public const ELETRICA = 'Elétrica';
    public const ELETRONICA = 'Eletrônica';
    public const PNEUMATICA = 'Pneumática';
    public const OUTRA = 'Outra';

    public static function getDescription($value): string
    {
        return match ($value) {
            self::MECANICA_GERAL => 'Especialidade em Mecânica Geral',
            self::ELETRICA => 'Especialidade em Elétrica',
            self::ELETRONICA => 'Especialidade em Eletrônica',
            self::PNEUMATICA => 'Especialidade em Pneumática',
            self::OUTRA => 'Outra Especialidade',
        };
    }

    public static function cases(): array
    {
        return array_keys(self::labels());
    }

    public static function labels(): array
    {
        return [
            self::MECANICA_GERAL => 'Mecânica Geral',
            self::ELETRICA => 'Elétrica',
            self::ELETRONICA => 'Eletrônica',
            self::PNEUMATICA => 'Pneumática',
            self::OUTRA => 'Outra',
        ];
    }
}
