<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rps extends Model
{
    /** @use HasFactory<\Database\Factories\RpsFactory> */
    use HasFactory;

    protected $fillable = [
        'start_datetime',
        'records',
        'branches_id',
        'total',
        'status',
        'first_rps_number',
    ];

    public $timestamps = true;
}
