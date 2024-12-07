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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('subject_br', 100)->nullable();
            $table->string('subject_en', 100)->nullable();
            $table->string('subject_es', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->integer('branches_id')->default(1);

            $table->timestamps();

            $table->index('branches_id');

            $table->foreign('branches_id')->references('id')->on('branches')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
