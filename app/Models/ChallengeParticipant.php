<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ChallengeParticipant extends Model
{
    /** @use HasFactory<\Database\Factories\ChallengeParticipantFactory> */
    use HasFactory;

    protected $fillable = [
        'challenge_event_id',
        'name',
        'email',
        'correct_answers',
        'incorrect_answers',
        'status',
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
