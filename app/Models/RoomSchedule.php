<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RoomSchedule extends Model
{
    /** @use HasFactory<\Database\Factories\RoomScheduleFactory> */
    use HasFactory;

    protected $fillable = [
        'branch_id',
        'room_id',
        'booking_id',
        'start_time',
        'end_time',
        'is_blocked',
        'value',
        'participants',
        'reason',
    ];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }
}
