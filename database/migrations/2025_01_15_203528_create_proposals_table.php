<?php

use App\Enums\ProposalEventType;
use App\Enums\ProposalStatus;
use App\Enums\ProposalType;
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
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->constrained('branches')->cascadeOnDelete();
            $table->foreignId('customer_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('monitor_id')->constrained('users')->cascadeOnDelete();
            $table->date('event_date')->nullable();
            $table->enum('type', array_column(ProposalType::cases(), 'value'))->nullable();
            $table->enum('status', array_column(ProposalStatus::cases(), 'value'))->nullable();
            $table->timestamp('return_date')->nullable();
            $table->text('notes')->nullable();
            $table->unsignedInteger('item_person_quantity')->nullable();
            $table->unsignedInteger('item_room_quantity')->nullable();
            $table->unsignedInteger('item_monitoring_quantity')->nullable();
            $table->unsignedInteger('item_consultant_quantity')->nullable();
            $table->unsignedInteger('item_waiter_quantity')->nullable();
            $table->unsignedInteger('item_partykit_quantity')->nullable();
            $table->unsignedInteger('item_coffee_quantity')->nullable();
            $table->decimal('item_person_amount', 10, 2)->nullable();
            $table->decimal('item_room_amount', 10, 2)->nullable();
            $table->decimal('item_monitoring_amount', 10, 2)->nullable();
            $table->decimal('item_consultant_amount', 10, 2)->nullable();
            $table->decimal('item_waiter_amount', 10, 2)->nullable();
            $table->decimal('item_partykit_amount', 10, 2)->nullable();
            $table->decimal('item_coffee_amount', 10, 2)->nullable();
            $table->decimal('item_other_amount', 10, 2)->nullable();
            $table->decimal('item_openingfee_amount', 10, 2)->nullable();
            $table->text('item_other_description')->nullable();
            $table->string('party_title')->nullable();
            $table->decimal('total_amount', 10, 2)->nullable();
            $table->text('coffee_schedule_description')->nullable();
            $table->text('extra_room_schedule_description')->nullable();
            $table->decimal('item_lunch_amount', 10, 2)->nullable();
            $table->decimal('item_happyhour_amount', 10, 2)->nullable();
            $table->decimal('item_cleaning_amount', 10, 2)->nullable();
            $table->decimal('student_amount', 10, 2)->nullable();
            $table->decimal('participant_amount', 10, 2)->nullable();
            $table->decimal('snack_amount', 10, 2)->nullable();
            $table->decimal('transport_amount', 10, 2)->nullable();
            $table->unsignedInteger('student_quantity')->nullable();
            $table->unsignedInteger('participant_quantity')->nullable();
            $table->unsignedInteger('snack_quantity')->nullable();
            $table->unsignedInteger('transport_quantity')->nullable();
            $table->boolean('is_custom')->default(false);
            $table->boolean('is_scenography')->default(false);
            $table->string('event_time')->nullable();
            $table->string('product')->nullable();
            $table->timestamp('last_return_date')->nullable();
            $table->enum('event_type', array_column(ProposalEventType::cases(), 'value'))->default(ProposalEventType::DEFAULT);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposals');
    }
};
