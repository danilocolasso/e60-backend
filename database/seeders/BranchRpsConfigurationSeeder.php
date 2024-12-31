<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchRpsConfigurationSeeder extends Seeder
{
    public function run(): void
    {
        $data = DB::connection('mysql')->table('filial')->get()->map(fn($row) => [
            'branch_id' => $row->id_filial,
            'last_rps_number' => $row->numero_ultimo_rps,
            'tax_rate' => $row->rps_aliquota,
            'service_code' => $row->rps_codigo_servico,
            'federal_service_code' => $row->rps_codigo_servico_federal,
            'municipal_service_code' => $row->rps_codigo_servico_municipal,
            'municipal_taxation_code' => $row->rps_codigo_tributacao_municipio,
            'format' => $row->rps_formato,
            'service_item_list' => $row->rps_item_lista_servico,
            'simple_national_optant' => $row->rps_optante_simples_nacional,
            'special_trib_regime' => $row->rps_regime_especial_trib_nota,
            'service_trib_code' => $row->rps_trib_servico_nota,
        ])->toArray();

        DB::connection('pgsql')->table('branch_rps_configurations')->insert($data);
    }
}
