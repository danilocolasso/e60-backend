<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    /** @use HasFactory<\Database\Factories\DictionaryFactory> */
    use HasFactory;

    protected $fillable = [
        'index',
        'text_pt',
        'text_en',
        'text_es',
        'branches_id'
    ];
}
