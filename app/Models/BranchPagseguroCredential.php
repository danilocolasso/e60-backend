<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchPagseguroCredential extends Model
{
    /** @use HasFactory<\Database\Factories\BranchPagseguroFactory> */
    use HasFactory;

    protected $fillable = [
        'branch_id',
        'token',
        'email',
        'client_id',
        'client_secret',
    ];
}
