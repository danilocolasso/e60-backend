<?php

namespace App\Enums;

enum ChallengeParticipantRoles: string
{
    case ACTIVE = 'active';
    case WON = 'won';
    case LOST = 'lost';

    public static function random(): self
    {
        $cases = self::cases();
        return $cases[array_rand($cases)];
    }
}
