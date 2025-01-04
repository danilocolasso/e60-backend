<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('pgsql')->create('comments', function (Blueprint $table) {
            $table->id();
            $table->longText('comment');
            $table->foreignId('customer_id')->nullable()->constrained('customers')->onDelete('cascade');
            $table->foreignId('parent_comment_id')->nullable()->constrained('comments')->onDelete('cascade');
            $table->foreignId('approved_by_user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('room_id')->nullable()->constrained('rooms')->onDelete('cascade');
            $table->timestamp('approved_at')->nullable();

            $table->timestamps();

            $table->index('customer_id');
            $table->index('parent_comment_id');
            $table->index('approved_by_user_id');
            $table->index('room_id');
        });
    }

    public function down(): void
    {
        Schema::connection('pgsql')->dropIfExists('comments');
    }
};
