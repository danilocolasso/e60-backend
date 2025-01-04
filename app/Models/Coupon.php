<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    /** @use HasFactory<\Database\Factories\CouponFactory> */
    use HasFactory;

    protected $fillable = [
        'code',
        'discount',
        'fixed_amount_per_person',
        'branch_id',
        'room_id',
        'booking_id',
        'expiration_date',
        'start_time',
        'end_time',
        'reservation_start_date',
        'reservation_end_date',
        'partner',
        'days_of_week',
    ];
}
