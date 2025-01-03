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
            'user_id' => in_array($row->id_usuario, [0, 33, 57, 146, 249]) ? null : $row->id_usuario,
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
            'progressive_discount_json' => $row->desconto_progressivo_json,
            'is_advance_voucher' => $row->voucher_antecipado_sn == 'S',
            'deleted_at' => $row->excluido_sn == 'S' ? now() : null,
        ])->toArray();

        DB::connection('pgsql')->table('branches')->insert($data);
    }
}
