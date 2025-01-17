<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    /** @use HasFactory<\Database\Factories\CouponFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'code',
        'discount',
        'fixed_amount_per_person',
        'booking_id',
        'branch_id',
        'room_id',
        'customer_id',
        'valid_until',
        'start_time',
        'end_time',
        'partner_name',
        'is_valid_sunday',
        'is_valid_monday',
        'is_valid_tuesday',
        'is_valid_wednesday',
        'is_valid_thursday',
        'is_valid_friday',
        'is_valid_saturday',
        'booking_start_date',
        'booking_end_date',
    ];

    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function customers(): BelongsToMany
    {
        return $this->BelongsToMany(Customer::class)->withTimestamps();
    }
}
