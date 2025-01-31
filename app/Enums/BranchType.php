<?php

namespace App\Enums;

use Illuminate\Support\Str;

enum BranchType: string
{
    case ESCAPE = 'escape';
    case XTREME = 'xtreme';

    public static function options(): array
    {
        return array_map(fn($case) => [
            'label' => Str::ucfirst($case->value),
            'value' => $case->value,
        ], self::cases());
    }
}
