<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('pgsql')->create('challenge_events', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100)->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->json('json_parameter')->nullable();
            $table->boolean('is_active')->default(false);

            $table->softDeletes();
            $table->timestamps();

            $table->index('is_active');
        });
    }

    public function down(): void
    {
        Schema::connection('pgsql')->dropIfExists('challenge_events');
    }
};
