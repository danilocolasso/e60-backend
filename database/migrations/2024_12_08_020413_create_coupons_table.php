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
            $table->string('code', 15);
            $table->unsignedInteger('discount')->default(0);
            $table->double('fixed_amount_per_person', 8, 2)->unsigned()->default(0);
            $table->unsignedBigInteger('branches_id')->nullable();
            $table->unsignedBigInteger('rooms_id')->nullable();
            $table->unsignedBigInteger('bookings_id')->nullable();
            $table->date('expiration_date')->nullable();
            $table->string('start_time', 5)->default(null);
            $table->string('end_time', 5)->default(null);
            $table->date('reservation_start_date')->nullable();
            $table->date('reservation_end_date')->nullable();
            $table->string('partner', 50)->nullable();
            $table->boolean('sunday')->default(true);
            $table->boolean('monday')->default(true);
            $table->boolean('tuesday')->default(true);
            $table->boolean('wednesday')->default(true);
            $table->boolean('thursday')->default(true);
            $table->boolean('friday')->default(true);
            $table->boolean('saturday')->default(true);

            $table->softDeletes();
            $table->timestamps();

            $table->index('code');
            $table->index('branches_id');
            $table->index('rooms_id');
            $table->index('bookings_id');
            $table->index('expiration_date');
            $table->index('sunday');
            $table->index('monday');
            $table->index('tuesday');
            $table->index('wednesday');
            $table->index('thursday');
            $table->index('friday');
            $table->index('saturday');

            $table->index(['code', 'expiration_date']);

            $table->foreign('branches_id')->references('id')->on('branches')->onDelete('set null');
            $table->foreign('rooms_id')->references('id')->on('rooms')->onDelete('set null');
            $table->foreign('bookings_id')->references('id')->on('bookings')->onDelete('set null');
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
