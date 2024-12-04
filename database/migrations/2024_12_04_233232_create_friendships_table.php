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
        Schema::create('friendship', function (Blueprint $table) {
            $table->id(); // id_amizade
            $table->unsignedBigInteger('customers_id')->nullable(); // id_cliente
            $table->unsignedBigInteger('friendship_customers_id')->nullable(); // id_cliente_amigo
            $table->string('status', 45)->nullable()->comment('status'); // status

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
