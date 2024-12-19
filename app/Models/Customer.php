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
        'cpf',
        'birth_date',
        'street',
        'number',
        'complement',
        'district',
        'city',
        'state',
        'zip_code',
        'email',
        'password',
        'mobile_number',
        'phone_number',
        'news_subscription',
        'is_corporate',
        'contact_json',
        'branches_id',
        'rdstation_message',
        'rdstation_timestamp',
        'rdstation_uuid',
        'invitation_code',
        'invitation_used',
        'achievements',
        'username',
        'image_url',
    ];

    public function photos()
    {
        return $this->hasMany(CustomerPhoto::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
