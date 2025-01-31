<?php

namespace App\Enums;

enum RpsSimplesNationalOptant: string
{
    case NOT_OPTANT = '0';
    case OPTANT = '1';

    /**
     * Get the description of the enum case.
     *
     * @return string
     */
    public function description(): string
    {
        return match ($this) {
            self::NOT_OPTANT => 'NF-Carioca - 0 - Não-Optante pelo Simples Nacional',
            self::OPTANT => 'NF-Carioca - 1 - Optante pelo Simples Nacional (Recolhimento pelo DAS)',
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
