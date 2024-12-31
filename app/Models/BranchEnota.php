<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchEnota extends Model
{
    /** @use HasFactory<\Database\Factories\BranchEnotaFactory> */
    use HasFactory;

    protected $fillable = [
        'branch_id',
        'enotas_api_key',
        'enotas_company_id',
    ];
}
