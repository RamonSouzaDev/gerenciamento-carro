<?php

namespace App\Enums;

use Illuminate\Validation\Rules\Enum;

final class VeiculoStatusEnum extends Enum
{
    public const EXCELENTE = 'Excelente';
    public const BOM = 'Bom';
    public const REGULAR = 'Regular';
    public const DESGASTADO = 'Desgastado';

    public static function getDescription($value): string
    {
        return match ($value) {
            self::EXCELENTE => 'Excelente estado de conservação',
            self::BOM => 'Bom estado de conservação',
            self::REGULAR => 'Regular estado de conservação',
            self::DESGASTADO => 'Desgastado estado de conservação',
        };
    }

    public static function cases(): array
    {
        return array_keys(self::labels());
    }

    public static function labels(): array
    {
        return [
            self::EXCELENTE => 'Excelente',
            self::BOM => 'Bom',
            self::REGULAR => 'Regular',
            self::DESGASTADO => 'Desgastado',
        ];
    }
}
