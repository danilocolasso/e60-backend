<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('pgsql')->create('customer_photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->nullable()->constrained('customers')->onDelete('cascade');
            $table->string('legend', 45)->nullable();
            $table->string('url', 120)->nullable();
            $table->boolean('share')->default(false);

            $table->timestamps();

            $table->index('customer_id');
            $table->index('share');
        });
    }

    public function down(): void
    {
        Schema::connection('pgsql')->dropIfExists('customer_photos');
    }
};
