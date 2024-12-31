<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentsFactory> */
    use HasFactory;

    protected $fillable = [
        'comment',
        'customer_id',
        'parent_comment_id',
        'approved_by_user_id',
        'room_id',
        'approved_at',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function parentComment()
    {
        return $this->belongsTo(Comment::class, 'parent_comment_id');
    }

    public function childComment()
    {
        return $this->hasMany(Comment::class, 'parent_comment_id');
    }
}
