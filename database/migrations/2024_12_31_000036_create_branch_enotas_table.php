<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('pgsql')->create('branch_enotas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->nullable()->constrained('branches')->onDelete('cascade');
            $table->string('enotas_api_key', 250)->nullable();
            $table->string('enotas_company_id', 250)->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->index('branch_id');
        });
    }

    public function down(): void
    {
        Schema::connection('pgsql')->dropIfExists('branch_enotas');
    }
};
