<?php

namespace App\Enums;

enum NfeStatus: string
{
    const PENDING = 'pending';
    const EMITTED = 'emitted';
    const CANCELED = 'canceled';
}
