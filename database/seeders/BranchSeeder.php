<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $oldTable = DB::table('filial')->get();

        $data = $oldTable->map(function ($row) {
            return [
                'rps_id' => $row->id_filial_rps,
                'users_id' => $row->id_usuario,
                'type' => $row->tipo,
                'name' => $row->filial,
                'phone' => preg_replace('/\D/', '', $row->telefone),
                'is_active' => $row->ativo_sn == 'S' ? true : false,
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
                'pagseguro_token' => $row->pagseguro_token,
                'pagseguro_email' => $row->pagseguro_email,
                'pagseguro_client_id' => $row->pagseguro_client_id,
                'pagseguro_client_secret' => $row->pagseguro_client_secret,
                'paypal_user' => $row->paypal_user,
                'paypal_password' => $row->paypal_pwd,
                'paypal_signature' => $row->paypal_signature,
                'enotas_api_key' => $row->enotas_apikey,
                'enotas_company_id' => $row->enotas_empresaid,
                'template_path_issue_report' => $row->caminho_template_oquehouve,
                'progressive_discount_json' => $row->desconto_progressivo_json,
                'proposal_text' => $row->proposta_texto,
                'last_rps_number' => $row->numero_ultimo_rps,
                'rps_tax_rate' => $row->rps_aliquota,
                'rps_service_code' => $row->rps_codigo_servico,
                'rps_federal_service_code' => $row->rps_codigo_servico_federal,
                'rps_municipal_service_code' => $row->rps_codigo_servico_municipal,
                'rps_municipal_taxation_code' => $row->rps_codigo_tributacao_municipio,
                'rps_format' => $row->rps_formato,
                'rps_service_item_list' => $row->rps_item_lista_servico,
                'rps_simple_national_optant' => $row->rps_optante_simples_nacional,
                'rps_special_trib_regime' => $row->rps_regime_especial_trib_nota,
                'rps_service_trib_code' => $row->rps_trib_servico_nota,
                'giftcard_person_limit' => $row->limite_pessoa_giftcard,
                'giftcard_value_per_person' => $row->valor_por_pessoa_giftcard,
                'is_advance_voucher' => $row->voucher_antecipado_sn == 'S' ? true : false,
                'deleted_at' => $row->excluido_sn == 'S' ? now() : null,
                'created_at' => now(),
            ];
        })->toArray();

        DB::table('branches')->insert($data);
    }
}
