<?php

namespace App\Enums;

enum RpsTaxServiceInvoice: string
{
    case TRIBUTATION_IN_MUNICIPALITY = '01';
    case TRIBUTATION_OUTSIDE_MUNICIPALITY = '02';
    case OPERATION_EXEMPT = '03';
    case OPERATION_IMMUNE = '04';
    case OPERATION_SUSPENDED_BY_JUDICIAL_DECISION = '05';
    case OPERATION_SUSPENDED_BY_ADMINISTRATIVE_DECISION = '06';

    /**
     * Get the description of the enum case.
     *
     * @return string
     */
    public function description(): string
    {
        return match ($this) {
            self::TRIBUTATION_IN_MUNICIPALITY => 'NF-Carioca - 01 - Tributação no Município',
            self::TRIBUTATION_OUTSIDE_MUNICIPALITY => 'NF-Carioca - 02 - Tributação fora do Município',
            self::OPERATION_EXEMPT => 'NF-Carioca - 03 - Operação Isenta',
            self::OPERATION_IMMUNE => 'NF-Carioca - 04 - Operação Imune',
            self::OPERATION_SUSPENDED_BY_JUDICIAL_DECISION => 'NF-Carioca - 05 - Operação Suspensa por Decisão Judicial',
            self::OPERATION_SUSPENDED_BY_ADMINISTRATIVE_DECISION => 'NF-Carioca - 06 - Operação Suspensa por Decisão Administrativa',
        };
    }

    /**
     * Get the options for the enum.
     *
     * Returns an array of options with 'label' and 'value' keys.
     *
     * @return array<int, array<string, string>>
     */
    public static function options(): array
    {
        return array_map(fn($case) => [
            'label' => $case->description(),
            'value' => $case->value,
        ], self::cases());
    }
}
