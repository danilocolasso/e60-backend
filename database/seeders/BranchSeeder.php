<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchSeeder extends Seeder
{
    private const TYPE = [
        'ESCAPE' => 'escape',
        'XTREME' => 'xtreme',
    ];

    public function run(): void
    {
        $data = DB::connection('mysql')->table('filial')->get()->map(fn($row) => [
            'id' => $row->id_filial,
            'type' => self::TYPE[$row->tipo],
            'name' => $row->filial,
            'phone' => preg_replace('/\D/', '', $row->telefone),
            'is_active' => $row->ativo_sn == 'S',
            'street' => $row->logradouro,
            'number' => $row->numero,
            'complement' => $row->complemento,
            'district' => $row->bairro,
            'city_code' => $row->codigo_municipio,
            'zip_code' => preg_replace('/\D/', '',$row->cep),
            'state' => $row->uf,
            'address' => $row->endereco,
            'cnpj' => $row->cnpj,
            'municipal_registration' => $row->inscricao_municipal,


            'enotas_api_key' => $row->enotas_apikey,
            'enotas_company_id' => $row->enotas_empresaid,
            'progressive_discount_json' => $row->desconto_progressivo_json,

            'giftcard_person_limit' => $row->limite_pessoa_giftcard,
            'giftcard_value_per_person' => $row->valor_por_pessoa_giftcard,
            'is_advance_voucher' => $row->voucher_antecipado_sn == 'S',
            'deleted_at' => $row->excluido_sn == 'S' ? now() : null,
        ])->toArray();

        Branch::factory()->count(5)->create();
    }
}
