<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ChallengeRiddle extends Model
{
    /** @use HasFactory<\Database\Factories\ChallengeRiddlesFactory> */
    use HasFactory;

    protected $fillable = [
        'challenge_event_id',
        'order',
        'title',
        'answer',
        'attempts',
        'image_path',
    ];

    public function challengeEvent(): BelongsTo
    {
        return $this->belongsTo(ChallengeEvent::class);
    }

    public function challengeParticipantRiddle(): HasMany
    {
        return $this->hasMany(ChallengeParticipantRiddle::class);
    }
}
