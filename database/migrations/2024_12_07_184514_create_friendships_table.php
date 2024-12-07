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
        Schema::create('friendships', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customers_id')->nullable();
            $table->unsignedBigInteger('friendship_customers_id')->nullable();
            $table->enum('status', ['confirmed', 'pending', 'rejected'])->nullable();

            $table->timestamps();

            $table->index('customers_id');
            $table->index('friendship_customers_id');
            $table->index('status');
            $table->index(['customers_id', 'friendship_customers_id']);

            $table->foreign('customers_id')->references('id')->on('customers')->onDelete('set null');
            $table->foreign('friendship_customers_id')->references('id')->on('friendship')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('friendships');
    }
};
