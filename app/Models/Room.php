<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    /** @use HasFactory<\Database\Factories\RoomFactory> */
    use HasFactory;

    protected $fillable = [
        'branch_id',
        'name_pt',
        'name_en',
        'name_es',
        'description_br',
        'description_en',
        'description_es',
        'image',
        'image_cover',
        'image_icon',
        'participants_min',
        'participants_max',
        'duration_in_minutes',
        'is_active',
        'is_delivery',
        'start_date',
        'end_date',
        'multiple_participants',
        'link_room',
    ];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function roomSchedule(): HasMany
    {
        return $this->hasMany(RoomSchedule::class);
    }
}
