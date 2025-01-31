<?php

namespace App\Enums;

enum RpsSpecialTaxRegimeInvoice: string
{
    case NONE = '00';
    case MUNICIPAL_MICROENTERPRISE = '01';
    case ESTIMATION = '02';
    case PROFESSIONAL_SOCIETY = '03';
    case COOPERATIVE = '04';
    case INDIVIDUAL_MICROENTREPRENEUR = '05';
    case LAW_691_84_ART_33_INC_II_ITEM_8 = '06';

    /**
     * Get the description of the enum case.
     *
     * @return string
     */
    public function description(): string
    {
        return match ($this) {
            self::NONE => 'NF-Carioca - 00 - Nenhum',
            self::MUNICIPAL_MICROENTERPRISE => 'NF-Carioca - 01 - Microempresa Municipal',
            self::ESTIMATION => 'NF-Carioca - 02 - Estimativa',
            self::PROFESSIONAL_SOCIETY => 'NF-Carioca - 03 - Sociedade de Profissionais',
            self::COOPERATIVE => 'NF-Carioca - 04 - Corporativa',
            self::INDIVIDUAL_MICROENTREPRENEUR => 'NF-Carioca - 05 - Microempreendedor Individual (MEI)',
            self::LAW_691_84_ART_33_INC_II_ITEM_8 => 'NF-Carioca - 06 - Art. 33, inc. II, item 8, Lei nº 691/84',
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
