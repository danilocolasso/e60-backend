<?php

namespace App\Enums;

enum FriendshipRoles: string
{
    case CONFIRMED = 'confirmed';
    case PENDING = 'pending';
    case REJECTED = 'rejected';

    public static function random(): self
    {
        $cases = self::cases();
        return $cases[array_rand($cases)];
    }
}
