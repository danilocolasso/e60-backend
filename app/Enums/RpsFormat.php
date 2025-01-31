<?php

namespace App\Enums;

enum RpsFormat: string
{
    case PAULISTA = 'NF-Paulista';
    case CARIOCA = 'NF-Carioca';
    case FORTALEZA = 'NF-Fortaleza';

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
            'label' => $case->value,
            'value' => $case->value,
        ], self::cases());
    }
}
