<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievements extends Model
{
    /** @use HasFactory<\Database\Factories\AchievementsFactory> */
    use HasFactory;

    protected $fillable = [
       'name',
       'description',
       'logo',
    ];
}
