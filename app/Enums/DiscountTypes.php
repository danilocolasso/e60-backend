<?php

namespace App\Enums;

enum DiscountTypes: string
{
    case FRIEND_COUPON = 'friend_coupon';
    case PARTNER_COUPON = 'partner_coupon';
    case ROOM = 'room';
}
