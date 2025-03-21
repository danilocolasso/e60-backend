<?php

namespace App\Models;

use App\Enums\CouponUsageType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
        'discount_type',
        'usage_type',
        'quantity',
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

    protected $casts = [
        'usage_type' => CouponUsageType::class,
    ];

    public function use(Customer $customer): void
    {
        switch ($this->usage_type) {
            case CouponUsageType::Unique:
                    if ($this->customers()->exists()) {
                        throw new \Exception('Este cupom já foi utilizado.');
                    }
                break;

            case CouponUsageType::UniquePerCustomer:
                if ($this->customers()->where('id', $customer->id)->exists()) {
                    throw new \Exception('Este cupom já foi utilizado por este cliente.');
                }
                break;

            case CouponUsageType::Limited:
                if ($this->customers()->count() >= $this->quantity) {
                    throw new \Exception('Este cupom atingiu o limite de utilização.');
                }
                break;
        }

        $this->customers()->attach($customer);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function branches()
    {
        return $this->rooms()
            ->with('branch')
            ->get()
            ->pluck('branch')
            ->unique('id')
            ->values();
    }

    public function customers(): BelongsToMany
    {
        return $this->belongsToMany(Customer::class)->withTimestamps();
    }

    public function rooms(): BelongsToMany
    {
        return $this->belongsToMany(Room::class)->withTimestamps();
    }
}
