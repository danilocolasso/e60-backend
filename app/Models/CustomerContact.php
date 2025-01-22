<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerContact extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerContactFactory> */
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'name',
        'department',
        'email',
        'phone',
        'created_at',
        'updated_at',
    ];
}
