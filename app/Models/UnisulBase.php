<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnisulBase extends Model
{
    /** @use HasFactory<\Database\Factories\UnisulBaseFactory> */
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
        'password',
    ];
}
