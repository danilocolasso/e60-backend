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
        Schema::create('unisul_bases', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('cpf', 20)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('state', 2)->nullable();
            $table->string('school', 100)->nullable();
            $table->string('university', 100)->nullable();
            $table->string('campus', 100)->nullable();
            $table->string('degree', 100)->nullable();
            $table->string('referral', 100)->nullable();
            $table->string('password')->nullable();

            $table->timestamps();

            $table->index('name');
            $table->index('email');
            $table->index('cpf');
            $table->index('phone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unisul_bases');
    }
};
