<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('pgsql')->create('subjects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->nullable()->constrained('branches')->onDelete('cascade');
            $table->string('subject_br', 100)->nullable();
            $table->string('subject_en', 100)->nullable();
            $table->string('subject_es', 100)->nullable();
            $table->string('email', 100)->nullable();

            $table->timestamps();

            $table->index('branch_id');
        });
    }

    public function down(): void
    {
        Schema::connection('pgsql')->dropIfExists('subjects');
    }
};
