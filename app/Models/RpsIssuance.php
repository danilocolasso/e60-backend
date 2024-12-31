<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
