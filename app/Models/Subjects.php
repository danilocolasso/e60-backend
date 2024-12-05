<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    /** @use HasFactory<\Database\Factories\SubjectsFactory> */
    use HasFactory;

    protected $fillable = [
        'subject_br',
        'subject_en',
        'subject_es',
        'email',
    ];

    public $timestamps = true;
}