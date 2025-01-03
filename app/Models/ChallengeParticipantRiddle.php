<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChallengeParticipantRiddle extends Model
{
    /** @use HasFactory<\Database\Factories\ChallengeParticipantRiddleFactory> */
    use HasFactory;

    protected $fillable = [
        'challenge_participants_id',
        'challenge_event_id',
        'challenge_riddle_id',
        'attempts',
        'answers',
        'status',
    ];

    public function challengeEvent(): BelongsTo
    {
        return $this->belongsTo(ChallengeEvent::class);
    }

    public function challengeParticipant(): BelongsTo
    {
        return $this->belongsTo(ChallengeParticipant::class);
    }

    public function challengeParticipantRiddle(): BelongsTo
    {
        return $this->belongsTo(ChallengeParticipantRiddle::class);
    }
}
