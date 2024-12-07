<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friendship extends Model
{
    /** @use HasFactory<\Database\Factories\FriendshipFactory> */
    use HasFactory;

    protected $fillable = [
        'customers_id',
        'recofriendship_customers_idrds',
        'status',
    ];
}
