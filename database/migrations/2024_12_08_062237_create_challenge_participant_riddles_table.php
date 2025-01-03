<?php

use App\Enums\ChallengeParticipantRiddlesRoles;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('pgsql')->create('challenge_participant_riddles', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('challenge_event_id')->nullable()->constrained('challenge_events')->onDelete('cascade');
            $table->foreignId('challenge_participants_id')->nullable()->constrained('challenge_participants')->onDelete('cascade');
            $table->foreignId('challenge_riddle_id')->nullable()->constrained('challenge_riddles')->onDelete('cascade');

            $table->unsignedInteger('attempts')->default(0);
            $table->string('answers', 500)->nullable();
            $table->enum('status', array_column(ChallengeParticipantRiddlesRoles::cases(), 'value'))->default(ChallengeParticipantRiddlesRoles::PENDING);

            $table->timestamps();

            $table->index('challenge_participants_id');
            $table->index('challenge_event_id');
            $table->index('challenge_riddle_id');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::connection('pgsql')->dropIfExists('challenge_participant_riddles');
    }
};
