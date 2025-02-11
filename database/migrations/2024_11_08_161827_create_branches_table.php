<?php

use App\Enums\BranchType;
use App\Enums\RpsFormat;
use App\Enums\RpsSimplesNationalOptant;
use App\Enums\RpsSpecialTaxRegimeInvoice;
use App\Enums\RpsTaxServiceInvoice;
use App\Enums\State;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rps_id')->nullable()->constrained('branches')->nullOnDelete();
            $table->foreignId('admin_user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->enum('type', array_column(BranchType::cases(), 'value'))->default(BranchType::ESCAPE);
            $table->string('name')->unique();
            $table->string('phone')->nullable();
            $table->enum('state', array_column(State::cases(), 'value'))->nullable();
            $table->json('pagseguro_data')->nullable();
            $table->json('paypal_data')->nullable();
            $table->enum('rps_format', array_column(RpsFormat::cases(), 'value'))->nullable()->default(RpsFormat::PAULISTA);
            $table->integer('municipal_registration');
            $table->string('cnpj', 18);
            $table->unsignedBigInteger('rps_last_number');
            $table->unsignedInteger('rps_municipal_service_code')->default(0);
            $table->enum('rps_tax_service_invoice', array_column(RpsTaxServiceInvoice::cases(), 'value'))->default(RpsTaxServiceInvoice::TRIBUTATION_IN_MUNICIPALITY);
            $table->enum('rps_special_tax_regime_invoice', array_column(RpsSpecialTaxRegimeInvoice::cases(), 'value'))->default(RpsSpecialTaxRegimeInvoice::NONE);
            $table->enum('rps_simple_national_optant', array_column(RpsSimplesNationalOptant::cases(), 'value'))->default(RpsSimplesNationalOptant::NOT_OPTANT);
            $table->unsignedInteger('rps_federal_service_code')->default(0);
            $table->decimal('rps_tax_rate')->default(0);
            $table->unsignedInteger('rps_code_service')->default(0);
            $table->unsignedInteger('rps_item_list_service')->default(0);
            $table->unsignedInteger('rps_municipal_taxation_code')->default(0);
            $table->decimal('giftcard_value_per_person')->default(0);
            $table->unsignedInteger('giftcard_person_limit')->default(1);
            $table->boolean('is_advance_voucher')->default(false);
            $table->string('address');
            $table->foreignId('city_id')->nullable()->constrained('cities');
            $table->string('zip_code', 9)->nullable();
            $table->text('proposal_text')->nullable();
            $table->string('template_issue_report_path')->nullable();
            $table->json('progressive_discount_data')->nullable();
            $table->json('enotas_data')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
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
