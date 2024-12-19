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
        Schema::create('dictionaries', function (Blueprint $table) {
            $table->id();
            $table->string('index', 100)->nullable();
            $table->text('text_pt')->nullable();
            $table->text('text_en')->nullable();
            $table->text('text_es')->nullable();
            $table->unsignedBigInteger('branches_id')->nullable();

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
        Schema::dropIfExists('dictionaries');
    }
};
