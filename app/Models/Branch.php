<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    /** @use HasFactory<\Database\Factories\BranchFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'type',
        'user_id',
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

    public function branchBanner(): HasMany
    {
        return $this->hasMany(BranchBanner::class);
    }

    public function branchEnotas(): HasMany
    {
        return $this->hasMany(BranchEnota::class);
    }

    public function branchGiftcard(): HasMany
    {
        return $this->hasMany(BranchGiftcard::class);
    }

    public function branchPagseguroCredential(): HasMany
    {
        return $this->hasMany(BranchPagseguroCredential::class);
    }

    public function branchPaypalCredential(): HasMany
    {
        return $this->hasMany(BranchPaypalCredential::class);
    }

    public function branchRpsConfiguration(): HasMany
    {
        return $this->hasMany(BranchRpsConfiguration::class);
    }

    public function dictionary(): HasMany
    {
        return $this->hasMany(Dictionary::class);
    }

    public function room(): HasMany
    {
        return $this->hasMany(Room::class);
    }

    public function roomSchedule(): HasMany
    {
        return $this->hasMany(RoomSchedule::class);
    }

    public function rpsIssuance(): HasMany
    {
        return $this->hasMany(RpsIssuance::class);
    }
}
