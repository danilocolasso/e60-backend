<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchBanner extends Model
{
    /** @use HasFactory<\Database\Factories\BranchBannerFactory> */
    use HasFactory;

    protected $fillable = [
        'banners_id',
        'branches_id',
    ];
}
