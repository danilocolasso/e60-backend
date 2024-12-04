<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friendships extends Model
{
    /** @use HasFactory<\Database\Factories\FriendshipsFactory> */
    use HasFactory;

    protected $fillable = [
        'customers_id',
        'recofriendship_customers_idrds',
        'status',
    ];

    public $timestamps = true;
}
