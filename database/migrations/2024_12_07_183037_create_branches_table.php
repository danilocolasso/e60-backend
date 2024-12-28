<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('rps_id')->nullable();
            $table->string('type', 20);
            $table->string('name', 50);
            $table->string('phone', 50);
            $table->boolean('is_active')->default(false);
            $table->string('street', 100)->nullable();
            $table->string('number', 10)->nullable();
            $table->string('complement')->nullable();
            $table->string('district')->nullable();
            $table->string('city_code', 20)->nullable();
            $table->string('zip_code', 9)->nullable();
            $table->string('state', 2)->nullable();
            $table->string('address')->nullable();
            $table->string('cnpj', 14)->nullable();
            $table->string('municipal_registration', 8)->nullable();
            $table->string('pagseguro_token', 255)->nullable();
            $table->string('pagseguro_email', 100)->nullable();
            $table->string('pagseguro_client_id', 100)->nullable();
            $table->string('pagseguro_client_secret', 100)->nullable();
            $table->string('paypal_user', 100)->nullable();
            $table->string('paypal_password', 100)->nullable();
            $table->string('paypal_signature', 255)->nullable();
            $table->string('enotas_api_key', 250)->nullable();
            $table->string('enotas_company_id', 250)->nullable();
            $table->string('template_path_issue_report', 250)->nullable();
            $table->longText('progressive_discount_json')->nullable();
            $table->text('proposal_text')->nullable();
            $table->integer('last_rps_number')->default(0);
            $table->double('rps_tax_rate')->nullable();
            $table->string('rps_service_code', 5)->nullable();
            $table->string('rps_federal_service_code', 20)->nullable();
            $table->string('rps_municipal_service_code', 20)->nullable();
            $table->string('rps_municipal_taxation_code', 45)->nullable();
            $table->string('rps_format', 20)->nullable();
            $table->string('rps_service_item_list', 45)->nullable();
            $table->boolean('rps_simple_national_optant')->default(false);
            $table->string('rps_special_trib_regime', 2)->nullable();
            $table->string('rps_service_trib_code', 2)->nullable();
            $table->integer('giftcard_person_limit')->default(8);
            $table->double('giftcard_value_per_person')->nullable();
            $table->boolean('is_advance_voucher')->default(false);

            $table->softDeletes();
            $table->timestamps();

            $table->index('rps_id');
            $table->index('name');

            $table->index(['rps_service_code', 'rps_tax_rate']);

//            $table->foreign('rps_id')->references('id')->on('rps')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
