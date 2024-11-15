<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'birthdate',
        'cpf',
        'phone',
        'cellphone',
        'address',
        'neighborhood',
        'city',
        'state',
        'zipcode',
    ];
}
