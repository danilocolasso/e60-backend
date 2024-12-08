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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->longText('comment');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('parent_comment_id')->nullable();
            $table->unsignedBigInteger('approved_by_user_id')->nullable();
            $table->unsignedBigInteger('room_id');
            $table->timestamp('approved_at')->nullable();

            $table->timestamps();

            $table->index('customer_id');
            $table->index('parent_comment_id');
            $table->index('approved_by_user_id');
            $table->index('room_id');

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('set null');
            $table->foreign('parent_comment_id')->references('id')->on('comments')->onDelete('set null');
            $table->foreign('approved_by_user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
