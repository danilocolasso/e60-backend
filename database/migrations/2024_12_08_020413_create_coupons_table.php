<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('pgsql')->create('coupons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->nullable()->constrained('branches')->onDelete('cascade');
            $table->foreignId('room_id')->nullable()->constrained('rooms')->onDelete('cascade');
            // $table->foreignId('booking_id')->nullable()->constrained('bookings')->onDelete('cascade');
            $table->string('code', 15);
            $table->unsignedInteger('discount')->default(0);
            $table->double('fixed_amount_per_person', 8, 2)->unsigned()->default(0);
            $table->date('expiration_date')->nullable();
            $table->string('start_time', 5)->default(null);
            $table->string('end_time', 5)->default(null);
            $table->date('reservation_start_date')->nullable();
            $table->date('reservation_end_date')->nullable();
            $table->string('partner', 50)->nullable();
            $table->json('days_of_week')->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->index('code');
            $table->index('branch_id');
            $table->index('room_id');
            // $table->index('booking_id');
            $table->index('expiration_date');

            $table->index(['code', 'expiration_date']);
        });
    }

    public function down(): void
    {
        Schema::connection('pgsql')->dropIfExists('coupons');
    }
};
