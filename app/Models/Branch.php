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
        'users_id',
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
        'pagseguro_token',
        'pagseguro_email',
        'pagseguro_client_id',
        'pagseguro_client_secret',
        'paypal_user',
        'paypal_password',
        'paypal_signature',
        'enotas_api_key',
        'enotas_company_id',
        'template_path_issue_report',
        'progressive_discount_json',
        'last_rps_number',
        'rps_tax_rate',
        'rps_service_code',
        'rps_federal_service_code',
        'rps_municipal_service_code',
        'rps_municipal_taxation_code',
        'rps_format',
        'rps_service_item_list',
        'rps_simple_national_optant',
        'rps_special_trib_regime',
        'rps_service_trib_code',
        'giftcard_person_limit',
        'giftcard_value_per_person',
        'is_advance_voucher',
    ];
}
