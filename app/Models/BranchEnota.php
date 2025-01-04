<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BranchEnota extends Model
{
    /** @use HasFactory<\Database\Factories\BranchEnotaFactory> */
    use HasFactory;

    protected $fillable = [
        'branch_id',
        'enotas_api_key',
        'enotas_company_id',
    ];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }
}
