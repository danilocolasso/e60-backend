<?php

namespace App\Enums;

enum BookingStatus: string
{
    const PENDING = 'pending';
    const CONFIRMED = 'confirmed';
    const CANCELED = 'canceled';
}
