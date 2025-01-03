<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ChallengeEvent extends Model
{
    /** @use HasFactory<\Database\Factories\ChallengeEventFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'start_date',
        'end_date',
        'json_parameter',
        'is_active',
    ];

    public function challengeParticipant(): HasMany
    {
        return $this->hasMany(ChallengeParticipant::class);
    }

    public function challengeRiddle(): HasMany
    {
        return $this->hasMany(ChallengeRiddle::class);
    }
}
