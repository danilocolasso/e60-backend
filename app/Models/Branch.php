<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    /** @use HasFactory<\Database\Factories\BranchFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'rps_id',
        'user_id',
        'type',
        'name',
        'phone',
        'state',
        'pagseguro_data',
        'paypal_data',
        'rps_format',
        'municipal_registration',
        'cnpj',
        'last_rps_number',
        'rps_municipal_service_code',
        'rps_trib_service_invoice',
        'rps_regime_especial_trib_invoice',
        'rps_simple_national_optant',
        'rps_federal_service_code',
        'rps_tax_rate',
        'rps_code_service',
        'rps_item_list_service',
        'rps_municipal_taxation_code',
        'rps_service_trib_code',
        'giftcard_value_per_person',
        'giftcard_person_limit',
        'is_advance_voucher',
        'street',
        'street_number',
        'complement',
        'neighborhood',
        'city_id',
        'zip_code',
        'proposal_text',
        'template_issue_report_path',
        'progressive_discount_data',
        'enotas_data',
        'is_active',
    ];

    protected $casts = [
        'pagseguro_data' => 'array',
        'paypal_data' => 'array',
        'progressive_discount_data' => 'array',
        'enotas_data' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function customers(): HasMany
    {
        return $this->hasMany(Customer::class);
    }

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }

    public function roomSchedules(): HasMany
    {
        return $this->hasMany(RoomSchedule::class);
    }

    public function coupons(): HasMany
    {
        return $this->hasMany(Coupon::class);
    }

    public function rpsBranch(): BelongsTo
    {
        return $this->belongsTo(self::class, 'rps_id');
    }
}
