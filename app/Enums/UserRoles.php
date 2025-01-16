<?php

namespace App\Enums;

enum UserRoles: string
{
    case ADMIN = 'admin';
    case USER = 'user';
    case AGENCY = 'agency';
    case RECEPTION = 'reception';
}
