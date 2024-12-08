<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChallengeParticipant extends Model
{
    /** @use HasFactory<\Database\Factories\ChallengeParticipantFactory> */
    use HasFactory;

    protected $fillable = [
        'challenge_events_id',
        'name',
        'email',
        'correct_answers',
        'incorrect_answers',
        'status',
    ];
}
