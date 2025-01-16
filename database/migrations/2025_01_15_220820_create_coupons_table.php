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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->decimal('discount', 5, 2)->nullable();
            $table->decimal('fixed_amount_per_person', 8, 2)->nullable();
            $table->date('valid_until')->nullable();
            $table->string('partner_name')->nullable();
            $table->foreignId('booking_id')->nullable()->constrained();
            $table->foreignId('branch_id')->nullable()->constrained('branches')->nullOnDelete();
            $table->foreignId('room_id')->nullable()->constrained();
            $table->foreignId('customer_id')->nullable()->constrained();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->boolean('is_valid_sunday')->default(false);
            $table->boolean('is_valid_monday')->default(false);
            $table->boolean('is_valid_tuesday')->default(false);
            $table->boolean('is_valid_wednesday')->default(false);
            $table->boolean('is_valid_thursday')->default(false);
            $table->boolean('is_valid_friday')->default(false);
            $table->boolean('is_valid_saturday')->default(false);
            $table->date('booking_start_date')->nullable();
            $table->date('booking_end_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
