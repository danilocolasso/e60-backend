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
        $oldBranches = DB::table('filial')->get();

        $branchesData = $oldBranches->map(function ($oldBranch) {
            return [
                'rps_id' => $oldBranch->id_filial_rps,
                'users_id' => $oldBranch->id_usuario,
                'type' => $oldBranch->tipo,
                'name' => $oldBranch->filial,
                'phone' => $oldBranch->telefone,
                'is_active' => $oldBranch->ativo_sn,
                'street' => $oldBranch->logradouro,
                'number' => $oldBranch->numero,
                'complement' => $oldBranch->complemento,
                'district' => $oldBranch->bairro,
                'city_code' => $oldBranch->codigo_municipio,
                'zip_code' => $oldBranch->cep,
                'state' => $oldBranch->uf,
                'address' => $oldBranch->endereco,
                'cnpj' => $oldBranch->cnpj,
                'municipal_registration' => $oldBranch->inscricao_municipal,
                'pagseguro_token' => $oldBranch->pagseguro_token,
                'pagseguro_email' => $oldBranch->pagseguro_email,
                'pagseguro_client_id' => $oldBranch->pagseguro_client_id,
                'pagseguro_client_secret' => $oldBranch->pagseguro_client_secret,
                'paypal_user' => $oldBranch->paypal_user,
                'paypal_password' => $oldBranch->paypal_pwd,
                'paypal_signature' => $oldBranch->paypal_signature,
                'enotas_api_key' => $oldBranch->enotas_apikey,
                'enotas_company_id' => $oldBranch->enotas_empresaid,
                'template_path_issue_report' => $oldBranch->caminho_template_oquehouve,
                'progressive_discount_json' => $oldBranch->desconto_progressivo_json,
                'proposal_text' => $oldBranch->proposta_texto,
                'last_rps_number' => $oldBranch->numero_ultimo_rps,
                'rps_tax_rate' => $oldBranch->rps_aliquota,
                'rps_service_code' => $oldBranch->rps_codigo_servico,
                'rps_federal_service_code' => $oldBranch->rps_codigo_servico_federal,
                'rps_municipal_service_code' => $oldBranch->rps_codigo_servico_municipal,
                'rps_municipal_taxation_code' => $oldBranch->rps_codigo_tributacao_municipio,
                'rps_format' => $oldBranch->rps_formato,
                'rps_service_item_list' => $oldBranch->rps_item_lista_servico,
                'rps_simple_national_optant' => $oldBranch->rps_optante_simples_nacional,
                'rps_special_trib_regime' => $oldBranch->rps_regime_especial_trib_nota,
                'rps_service_trib_code' => $oldBranch->rps_trib_servico_nota,
                'giftcard_person_limit' => $oldBranch->limite_pessoa_giftcard,
                'giftcard_value_per_person' => $oldBranch->valor_por_pessoa_giftcard,
                'is_advance_voucher' => $oldBranch->voucher_antecipado_sn,
                'deleted_at' => $oldBranch->excluido_sn,
                'created_at' => now(),
            ];
        })->toArray();

        DB::table('branches')->insert($branchesData);
    }
}
