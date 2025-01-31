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

    protected $hidden = [
        'progressive_discount_data',
    ];

    protected $fillable = [
        'rps_id',
        'admin_user_id',
        'type',
        'name',
        'phone',
        'state',
        'pagseguro_data',
        'paypal_data',
        'rps_format', // rps_formato
        'municipal_registration',
        'cnpj',
        'rps_last_number', // numero_ultimo_rps
        'rps_municipal_service_code', // rps_codigo_servico_municipal
        'rps_tax_service_invoice', // rps_trib_servico_nota
        'rps_special_tax_regime_invoice', // rps_regime_especial_trib_nota
        'rps_simple_national_optant', // rps_optante_simples_nacional
        'rps_federal_service_code', // rps_codigo_servico_federal
        'rps_tax_rate', // rps_aliquota
        'rps_code_service', // rps_codigo_servico
        'rps_item_list_service', // rps_item_lista_servico
        'rps_municipal_taxation_code', // rps_codigo_tributacao_municipio
        'giftcard_value_per_person',
        'giftcard_person_limit',
        'is_advance_voucher',
        'address',
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

    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'admin_user_id');
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

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function rps(): BelongsTo
    {
        return $this->belongsTo(self::class);
    }
}
