<?php

namespace App\Enums;

enum CouponUsageType: string
{
    case Unique = 'unique';
    case UniquePerCustomer = 'unique_per_customer';
    case Limited = 'limited';
    case Unlimited = 'unlimited';
}
