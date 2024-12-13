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
        return $this->belongsTo(Comments::class, 'parent_comment_id');
    }

    public function childComments()
    {
        return $this->hasMany(Comments::class, 'parent_comment_id');
    }
}
