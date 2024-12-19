<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChallengeParticipantRiddle extends Model
{
    /** @use HasFactory<\Database\Factories\ChallengeParticipantRiddleFactory> */
    use HasFactory;

    protected $fillable = [
        'challenge_participants_id',
        'challenge_events_id',
        'challenge_riddles_id',
        'attempts',
        'answers',
        'status',
    ];
}
