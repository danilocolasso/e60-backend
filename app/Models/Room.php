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
        'name',
        'name_en',
        'name_es',
        'image_url',
        'cover_url',
        'icon_url',
        'description',
        'description_en',
        'description_es',
        'min_participants',
        'max_participants',
        'duration_minutes',
        'branch_id',
        'display_branch_id',
        'valid_from',
        'valid_until',
        'url',
        'is_multi_participants',
        'is_delivery',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_deleted' => 'boolean',
        'is_multi_participants' => 'boolean',
        'is_delivery' => 'boolean',
    ];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function displayBranch(): BelongsTo
    {
        return $this->belongsTo(Branch::class, 'display_branch_id');
    }

    public function coupons(): HasMany
    {
        return $this->hasMany(Coupon::class);
    }

    public function roomSchedules(): HasMany
    {
        return $this->hasMany(RoomSchedule::class);
    }
}
