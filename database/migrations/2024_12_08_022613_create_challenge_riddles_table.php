<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('pgsql')->create('challenge_riddles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('challenge_event_id')->nullable()->constrained('challenge_events')->onDelete('cascade');
            $table->unsignedInteger('order')->nullable();
            $table->string('title', 100)->nullable();
            $table->string('answer', 100)->nullable();
            $table->unsignedInteger('attempts')->default(0);
            $table->string('image_path', 100)->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->index('challenge_event_id');
            $table->index('order');
            $table->index('attempts');
        });
    }

    public function down(): void
    {
        Schema::connection('pgsql')->dropIfExists('challenge_riddles');
    }
};
