<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rps extends Model
{
    /** @use HasFactory<\Database\Factories\RpsFactory> */
    use HasFactory;

    protected $fillable = [
        'branch_id',
        'start_time',
        'total_records',
        'total_amount',
        'status',
        'first_rps_number',
    ];

    protected $casts = [
        'start_time'       => 'datetime',
    ];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
