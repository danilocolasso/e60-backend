<?php

namespace App\Enums;

enum DiscountTypes: string
{
    const FRIEND_COUPON = 'friend_coupon';
    const PARTNER_COUPON = 'partner_coupon';
    const ROOM = 'room';
}
