<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dictionary extends Model
{
    /** @use HasFactory<\Database\Factories\DictionaryFactory> */
    use HasFactory;

    protected $fillable = [
        'index',
        'text_pt',
        'text_en',
        'text_es',
        'branch_id'
    ];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }
}
