<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BranchGiftcard extends Model
{
    /** @use HasFactory<\Database\Factories\BranchGiftcardFactory> */
    use HasFactory;

    protected $fillable = [
        'branch_id',
        'giftcard_person_limit',
        'giftcard_value_per_person',
    ];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }
}
