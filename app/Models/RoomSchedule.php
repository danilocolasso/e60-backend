<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomSchedule extends Model
{
    /** @use HasFactory<\Database\Factories\RoomScheduleFactory> */
    use HasFactory;

    protected $fillable = [
        'branch_id'.
        'room_id',
        'booking_id',
        'user_id',
        'date',
        'start_time',
        'end_time',
        'token',
        'price',
        'blocked_schedule',
        'blocking_history',
    ];
}
