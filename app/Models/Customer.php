<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static paginate(array|string|null $perPage, string[] $array, string $string, array|string|null $page)
 */
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
