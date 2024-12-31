<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('pgsql')->create('branch_rps_configurations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->double('tax_rate')->nullable();
            $table->string('service_code', 5)->nullable();
            $table->string('federal_service_code', 20)->nullable();
            $table->string('municipal_service_code', 20)->nullable();
            $table->string('municipal_taxation_code', 45)->nullable();
            $table->string('format', 20)->nullable();
            $table->string('service_item_list', 45)->nullable();
            $table->boolean('simple_national_optant')->default(false);
            $table->string('special_trib_regime', 2)->nullable();
            $table->string('service_trib_code', 2)->nullable();
            $table->integer('last_rps_number')->default(0);

            $table->softDeletes();
            $table->timestamps();

            $table->index('branch_id');
        });
    }

    public function down(): void
    {
        Schema::connection('pgsql')->dropIfExists('branch_rps_configurations');
    }
};
