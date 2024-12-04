<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id(); // id
            $table->unsignedInteger('rps_id')->nullable(); // id_filial_rps
            $table->unsignedInteger('users_id'); // id_usuario
            $table->string('type', 20); // tipo
            $table->string('name', 50); // filial
            $table->string('phone', 50); // telefone
            $table->boolean('is_active')->default(false); // ativo_sn
            $table->string('street', 100)->nullable(); // logradouro
            $table->string('number', 10)->nullable(); // numero
            $table->string('complement', 50)->nullable(); // complemento
            $table->string('district', 50)->nullable(); // bairro
            $table->string('city_code', 20)->nullable(); // codigo_municipio
            $table->string('zip_code', 9)->nullable(); // cep
            $table->string('state', 2)->nullable(); // uf
            $table->string('cnpj', 14)->nullable(); // cnpj
            $table->string('municipal_registration', 8)->nullable(); // inscricao_municipal
            $table->string('pagseguro_token', 255)->nullable(); // pagseguro_token
            $table->string('pagseguro_email', 100)->nullable(); // pagseguro_email
            $table->string('pagseguro_client_id', 100)->nullable(); // pagseguro_client_id
            $table->string('pagseguro_client_secret', 100)->nullable(); // pagseguro_client_secret
            $table->string('paypal_user', 100)->nullable(); // paypal_user
            $table->string('paypal_password', 100)->nullable(); // paypal_pwd
            $table->string('paypal_signature', 255)->nullable(); // paypal_signature
            $table->string('enotas_api_key', 250)->nullable(); // enotas_apikey
            $table->string('enotas_company_id', 250)->nullable(); // enotas_empresaid
            $table->string('template_path_issue_report', 250)->nullable(); // caminho_template_oquehouve
            $table->longText('progressive_discount_json')->nullable(); // desconto_progressivo_json
            $table->text('proposal_text')->nullable(); // proposta_texto
            $table->integer('last_rps_number')->default(0); // numero_ultimo_rps
            $table->double('rps_tax_rate')->nullable(); // rps_aliquota
            $table->string('rps_service_code', 5)->nullable(); // rps_codigo_servico
            $table->string('rps_federal_service_code', 20)->nullable(); // rps_codigo_servico_federal
            $table->string('rps_municipal_service_code', 20)->nullable(); // rps_codigo_servico_municipal
            $table->string('rps_municipal_taxation_code', 45)->nullable(); // rps_codigo_tributacao_municipio
            $table->string('rps_format', 20)->nullable(); // rps_formato
            $table->string('rps_service_item_list', 45)->nullable(); // rps_item_lista_servico
            $table->boolean('rps_simple_national_optant')->default(false); // excluido_sn
            $table->string('rps_special_trib_regime', 2)->nullable(); // rps_regime_especial_trib_nota
            $table->string('rps_service_trib_code', 2)->nullable(); // rps_trib_servico_nota
            $table->integer('giftcard_person_limit')->default(8); // limite_pessoa_giftcard
            $table->double('giftcard_value_per_person')->nullable(); // valor_por_pessoa_giftcard
            $table->boolean('is_advance_voucher')->default(false); // voucher_antecipado_sn

            $table->softDeletes(); // excluido_sn
            $table->timestamps();

            $table->index('rps_id');
            $table->index('users_id');
            $table->index('name');

            $table->index(['rps_id', 'users_id']);
            $table->index(['rps_service_code', 'rps_tax_rate']);

            $table->foreign('rps_id')->references('id')->on('rps')->onDelete('set null');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
