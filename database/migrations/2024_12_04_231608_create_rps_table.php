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
        Schema::create('rps', function (Blueprint $table) {
            $table->id(); // id_rps
            $table->dateTime('start_datetime'); // data_horario_inicio
            $table->unsignedInteger('records')->default(0); // registros
            $table->unsignedInteger('branches_id')->default(0); // id_filial
            $table->double('total')->nullable(); // valor_total
            $table->string('status', 30)->default('GENERATED'); // status
            $table->integer('first_rps_number')->default(0); // numero_primeiro_rps

            $table->timestamps();  // data_cadastro

            $table->index('branches_id');
            $table->index(['status', 'created_at'], 'idx_res_01');

            $table->foreign('branches_id')->references('id')->on('branches')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rps');
    }
};
