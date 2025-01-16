<?php

use App\Enums\BookingStatus;
use App\Enums\BookingTypes;
use App\Enums\DiscountTypes;
use App\Enums\NfeStatus;
use App\Enums\PaymentMethods;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('room_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('proposal_id')->nullable()->constrained('proposals')->nullOnDelete();
            $table->foreignId('branch_id')->nullable()->constrained('branches')->nullOnDelete();
            $table->foreignId('rps_id')->constrained()->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('monitor_id')->nullable()->constrained('users')->nullOnDelete();
            $table->unsignedInteger('participants')->nullable();
            $table->decimal('amount', 10, 2)->nullable();
            $table->date('due_date')->nullable();
            $table->enum('status', array_column(BookingStatus::cases(), 'value'))->default(BookingStatus::PENDING);
            $table->string('language')->nullable();
            $table->json('pagseguro_data')->nullable();
            $table->json('paypal_data')->nullable();
            $table->enum('payment_method', array_column(PaymentMethods::cases(), 'value'))->default(PaymentMethods::CASH);
            $table->timestamp('payment_date')->nullable();
            $table->enum('type', array_column(BookingTypes::cases(), 'value'))->default(BookingTypes::SINGLE);
            $table->decimal('paid_amount', 10, 2)->nullable();
            $table->unsignedInteger('participant_quantity')->nullable();
            $table->text('invoice_description')->nullable();
            $table->string('invoice_number')->nullable();
            $table->timestamp('invoice_date')->nullable();
            $table->enum('nfe_status', array_column(NfeStatus::cases(), 'value'))->default(NfeStatus::PENDING);
            $table->boolean('can_edit_invoice_number')->default(false);
            $table->string('party_code')->nullable();
            $table->string('party_title')->nullable();
            $table->text('history')->nullable();
            $table->boolean('is_email_issue_sent')->default(false);
            $table->decimal('student_amount', 10, 2)->nullable();
            $table->decimal('participant_amount', 10, 2)->nullable();
            $table->decimal('snack_amount', 10, 2)->nullable();
            $table->decimal('transport_amount', 10, 2)->nullable();
            $table->unsignedInteger('student_quantity')->nullable();
            $table->unsignedInteger('snack_quantity')->nullable();
            $table->unsignedInteger('transport_quantity')->nullable();
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
            $table->decimal('item_happyhour_amount', 10, 2)->nullable();
            $table->decimal('item_cleaning_amount', 10, 2)->nullable();
            $table->decimal('item_lunch_amount', 10, 2)->nullable();
            $table->text('coffee_schedule_description')->nullable();
            $table->text('extra_room_schedule_description')->nullable();
            $table->boolean('is_custom')->default(false);
            $table->boolean('is_scenography')->default(false);
            $table->date('event_date')->nullable();
            $table->time('event_start_time')->nullable();
            $table->time('event_end_time')->nullable();
            $table->string('product')->nullable();
            $table->decimal('amount_to_pay', 10, 2)->nullable();
            $table->boolean('is_giftcard')->default(false);
            $table->enum('discount_type', array_column(DiscountTypes::cases(), 'value'))->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
