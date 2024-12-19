<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerPhoto extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerPhotoFactory> */
    use HasFactory;

    protected $fillable = [
        'legend',
        'url',
        'share',
        'customer_id',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
