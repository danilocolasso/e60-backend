<?php

namespace App\Enums;

enum UserRoles: string
{
    case MASTER = 'master';
    case ADVANCED = 'advanced';
    case INTERMEDIATE = 'intermediate';
    case BASIC = 'basic';
}
