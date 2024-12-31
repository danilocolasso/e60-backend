<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    /** @use HasFactory<\Database\Factories\BranchFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'rps_id',
        'type',
        'name',
        'phone',
        'is_active',
        'street',
        'number',
        'complement',
        'district',
        'city_code',
        'zip_code',
        'state',
        'address',
        'cnpj',
        'municipal_registration',
        'progressive_discount_json',
        'is_advance_voucher',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
