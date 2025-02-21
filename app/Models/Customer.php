<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static paginate(array|string|null $perPage, string[] $array, string $string, array|string|null $page)
 */
class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $hidden = [
        'password',
        'deleted_at',
        'rd_station_data',
    ];

    protected $fillable = [
        'name',
        'document_number',
        'birth_date',
        'street',
        'street_number',
        'neighborhood',
        'zip_code',
        'complement',
        'city',
        'state',
        'email',
        'username',
        'password',
        'phone',
        'cellphone',
        'newsletter',
        'is_corporate',
        'branch_id',
        'image_url',
        'rd_station_data',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'newsletter' => 'boolean',
        'is_corporate' => 'boolean',
        'rd_station_data' => 'array',
    ];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function contacts(): HasMany
    {
        return $this->HasMany(CustomerContact::class);
    }

    public function achievements(): BelongsToMany
    {
        return $this->belongsToMany(Achievement::class)->withTimestamps();
    }
}
