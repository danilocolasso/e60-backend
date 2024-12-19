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
        Schema::create('challenge_participant_riddles', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('challenge_participants_id');
            $table->unsignedBigInteger('challenge_events_id');
            $table->unsignedBigInteger('challenge_riddles_id');
            $table->unsignedInteger('attempts')->default(0);
            $table->string('answers', 500)->nullable();
            $table->enum('status', ['pending', 'right', 'wrong'])->default('pending');

            $table->timestamps();

            $table->index('challenge_participants_id');
            $table->index('challenge_events_id');
            $table->index('challenge_riddles_id');
            $table->index('status');

            $table->foreign('challenge_participants_id')->references('id')->on('challenge_participants')->onDelete('set null');
            $table->foreign('challenge_events_id')->references('id')->on('challenge_events')->onDelete('set null');
            $table->foreign('challenge_riddles_id')->references('id')->on('challenge_riddles')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('challenge_participant_riddles');
    }
};
