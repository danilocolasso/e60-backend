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
        Schema::create('challenge_riddles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('challenge_events_id')->nullable();
            $table->unsignedInteger('order')->nullable();
            $table->string('title', 100)->nullable();
            $table->string('answer', 100)->nullable();
            $table->unsignedInteger('attempts')->default(0);
            $table->string('image_path', 100)->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->index('challenge_events_id');
            $table->index('order');
            $table->index('attempts');

            $table->foreign('challenge_events_id')->references('id')->on('challenge_events')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('challenge_riddles');
    }
};
