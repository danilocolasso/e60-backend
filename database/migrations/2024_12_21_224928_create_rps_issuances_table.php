<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('pgsql')->create('rps_issuances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->dateTime('start_datetime');
            $table->unsignedInteger('records')->default(0);
            $table->double('total_value')->nullable();
            $table->enum('status', ['generated', 'sent'])->default('generated');
            $table->integer('first_rps_number')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::connection('pgsql')->dropIfExists('rps_issuances');
    }
};
