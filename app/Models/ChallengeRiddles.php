<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChallengeRiddles extends Model
{
    /** @use HasFactory<\Database\Factories\ChallengeRiddlesFactory> */
    use HasFactory;

    protected $fillable = [
        'challenge_events_id',
        'order',
        'title',
        'answer',
        'attempts',
        'image_path',
    ];
}
