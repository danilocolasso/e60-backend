<?php

use App\Enums\FriendshipRoles;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('pgsql')->create('friendships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->nullable()->constrained('customers')->onDelete('cascade');
            $table->foreignId('friendship_customer_id')->nullable()->constrained('customers')->onDelete('cascade');
            $table->enum('status', array_column(FriendshipRoles::cases(), 'value'))->default(FriendshipRoles::PENDING);

            $table->softDeletes();
            $table->timestamps();

            $table->index('customer_id');
            $table->index('friendship_customer_id');
            $table->index('status');
            $table->index(['customer_id', 'friendship_customer_id']);
        });
    }

    public function down(): void
    {
        Schema::connection('pgsql')->dropIfExists('friendships');
    }
};
