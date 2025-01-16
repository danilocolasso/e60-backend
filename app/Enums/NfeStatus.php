<?php

namespace App\Enums;

enum NfeStatus: string
{
    case PENDING = 'pending';
    case EMITTED = 'emitted';
    case CANCELED = 'canceled';
}
