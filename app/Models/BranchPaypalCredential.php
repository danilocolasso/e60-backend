<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
