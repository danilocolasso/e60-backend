<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('pgsql')->create('room_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->nullable()->constrained('branches')->onDelete('cascade');
            $table->foreignId('room_id')->nullable()->constrained('rooms')->onDelete('cascade');
            // $table->foreignId('booking_id')->nullable()->constrained('bookings')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->date('date')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->string('token', 11)->nullable();
            $table->double('price')->default(0);
            $table->dateTime('blocked_schedule')->nullable();
            $table->longText('blocking_history')->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->index('branch_id');
            $table->index('room_id');
            // $table->index('booking_id');
            $table->index('user_id');
        });
    }

    public function down(): void
    {
        Schema::connection('pgsql')->dropIfExists('room_schedules');
    }
};
