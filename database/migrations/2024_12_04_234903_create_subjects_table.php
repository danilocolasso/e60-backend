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
        Schema::create('subject', function (Blueprint $table) {
            $table->id(); // id_subject
            $table->string('subject_br', 100)->nullable(); // subject_br
            $table->string('subject_en', 100)->nullable(); // subject_en
            $table->string('subject_es', 100)->nullable(); // subject_es
            $table->string('email', 100)->nullable(); // email
            $table->integer('branches_id')->default(1); // id_filial

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
