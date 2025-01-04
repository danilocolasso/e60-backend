<?php

namespace App\Enums;

enum BranchRoles: string
{
    case ESCAPE = 'escape';
    case XTREME = 'xtreme';

    public static function random(): self
    {
        $cases = self::cases();
        return $cases[array_rand($cases)];
    }
}
