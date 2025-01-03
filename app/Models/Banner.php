<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Banner extends Model
{
    /** @use HasFactory<\Database\Factories\BannerFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'link',
        'image',
        'is_active',
    ];

    public function branchBanner(): HasMany
    {
        return $this->hasMany(BranchBanner::class);
    }
}
