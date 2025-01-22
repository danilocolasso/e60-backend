<?php

namespace App\Enums;

enum UserRole: string
{
    case MASTER = 'master';
    case ADVANCED = 'advanced';
    case INTERMEDIATE = 'intermediate';
    case BASIC = 'basic';
}
