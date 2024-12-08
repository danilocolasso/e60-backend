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
        Schema::create('challenge_participants', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('challenge_participants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('challenge_events_id');
            $table->string('name', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->unsignedInteger('correct_answers')->default(0);
            $table->unsignedInteger('incorrect_answers')->default(0);
            $table->enum('status', ['active', 'won', 'lost'])->default('active');

            $table->timestamps();

            $table->index('challenge_events_id');
            $table->index('email');
            $table->index('active');

            $table->foreign('challenge_events_id')->references('id')->on('challenge_events')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('challenge_participants');
    }
};
