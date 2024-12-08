<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    /** @use HasFactory<\Database\Factories\CommentsFactory> */
    use HasFactory;

    protected $fillable = [
        'comment',
        'customers_id',
        'parent_comments_id',
        'approved_by_user_id',
        'rooms_id',
        'approved_at',
    ];
}
