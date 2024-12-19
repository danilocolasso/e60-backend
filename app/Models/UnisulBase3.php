<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnisulBase3 extends Model
{
    /** @use HasFactory<\Database\Factories\UnisulBase3Factory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'cpf',
        'phone',
        'city',
        'state',
        'school',
        'university',
        'campus',
        'degree',
        'referral',
    ];
}
