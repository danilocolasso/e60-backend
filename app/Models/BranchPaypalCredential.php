<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BranchPaypalCredential extends Model
{
    /** @use HasFactory<\Database\Factories\BranchPaypalFactory> */
    use HasFactory;

    protected $fillable = [
        'branch_id',
        'user',
        'password',
        'signature',
    ];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }
}
