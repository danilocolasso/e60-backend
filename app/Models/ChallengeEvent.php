<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
