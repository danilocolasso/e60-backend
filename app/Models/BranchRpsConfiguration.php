<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchRpsConfiguration extends Model
{
    /** @use HasFactory<\Database\Factories\BranchRpsFactory> */
    use HasFactory;

    protected $fillable = [
        'branch_id',
        'last_rps_number',
        'tax_rate',
        'service_code',
        'federal_service_code',
        'municipal_service_code',
        'municipal_taxation_code',
        'format',
        'service_item_list',
        'simple_national_optant',
        'special_trib_regime',
        'service_trib_code',
    ];
}
