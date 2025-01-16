<?php

use App\Enums\RpsStatus;
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
        Schema::create('rps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->nullable()->constrained('branches')->nullOnDelete();
            $table->timestamp('start_time')->nullable();
            $table->unsignedInteger('total_records')->default(0);
            $table->decimal('total_amount', 10, 2)->nullable();
            $table->enum('status', array_column(RpsStatus::cases(), 'value'))->default(RpsStatus::GENERATED);
            $table->unsignedInteger('first_rps_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rps');
    }
};
