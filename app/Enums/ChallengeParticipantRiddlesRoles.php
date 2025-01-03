<?php

namespace App\Enums;

enum ChallengeParticipantRiddlesRoles: string
{
    case PENDING = 'pending';
    case RIGHT = 'right';
    case WRONG = 'wrong';

    public static function random(): self
    {
        $cases = self::cases();
        return $cases[array_rand($cases)];
    }
}
