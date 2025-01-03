<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('pgsql')->create('dictionaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->nullable()->constrained('branches')->onDelete('cascade');
            $table->string('index', 100)->nullable();
            $table->longText('text_pt')->nullable();
            $table->longText('text_en')->nullable();
            $table->longText('text_es')->nullable();

            $table->timestamps();

            $table->index('branch_id');
        });
    }

    public function down(): void
    {
        Schema::connection('pgsql')->dropIfExists('dictionaries');
    }
};
