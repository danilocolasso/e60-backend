<?php

use App\Enums\ChallengeParticipantRoles;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('pgsql')->create('challenge_participants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('challenge_event_id')->nullable()->constrained('challenge_events')->onDelete('cascade');
            $table->string('name', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->unsignedInteger('correct_answers')->default(0);
            $table->unsignedInteger('incorrect_answers')->default(0);
            $table->enum('status', array_column(ChallengeParticipantRoles::cases(), 'value'))->default(ChallengeParticipantRoles::ACTIVE);

            $table->timestamps();

            $table->index('challenge_event_id');
            $table->index('email');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::connection('pgsql')->dropIfExists('challenge_participants');
    }
};
