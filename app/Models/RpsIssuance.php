<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RpsIssuance extends Model
{
    /** @use HasFactory<\Database\Factories\RpsIssuanceFactory> */
    use HasFactory;

    protected $fillable = [
        'branch_id',
        'start_datetime',
        'records',
        'total_value',
        'status',
        'first_rps_number',
    ];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }
}
