<?php

namespace App\Enums;

enum UserRoles: string
{
    case ADMIN = 'admin';
    case USER = 'user';
    case AGENCY = 'agency';
    case RECEPTION = 'reception';

    public static function random(): self
    {
        return self::cases()[array_rand(self::cases())];

    }
}
