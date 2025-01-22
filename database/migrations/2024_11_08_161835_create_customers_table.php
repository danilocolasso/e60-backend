<?php

use App\Enums\State;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('document_number')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('street')->nullable();
            $table->string('street_number')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('complement')->nullable();
            $table->string('city')->nullable();
            $table->enum('state', array_column(State::cases(), 'value'))->nullable();
            $table->string('username')->unique();
            $table->string('password');
            $table->boolean('newsletter')->default(false);
            $table->boolean('is_corporate')->default(false);
            $table->foreignId('branch_id')->constrained('branches')->cascadeOnDelete();
            $table->string('image_url')->nullable();
            $table->json('rd_station_data')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
