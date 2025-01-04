<?php

namespace App\Enums;

enum RpsIssuanceRoles: string
{
    case GENERATED = 'generated';
    case SENT = 'sent';

    public static function random(): self
    {
        $cases = self::cases();
        return $cases[array_rand($cases)];
    }
}
