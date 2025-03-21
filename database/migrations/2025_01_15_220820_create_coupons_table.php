<?php

use App\Enums\CouponDiscountType;
use App\Enums\CouponUsageType;
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
            $table->string('code');
            $table->decimal('discount', 5, 2)->default(0);
            $table->enum('discount_type', array_column(CouponDiscountType::cases(), 'value'))->default(CouponDiscountType::Fixed);
            $table->enum('usage_type', array_column(CouponUsageType::cases(), 'value'))->default(CouponUsageType::Unlimited);
            $table->unsignedInteger('quantity')->nullable();
            $table->date('valid_until')->nullable();
            $table->time('start_time');
            $table->time('end_time');
            $table->string('partner_name');
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
