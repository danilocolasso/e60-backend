<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('pgsql')->create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('city', 100)->nullable();
            $table->string('state', 2)->nullable();
            $table->string('zip_code', 8)->nullable();

            $table->timestamps();

            $table->index('city');
            $table->index('state');
            $table->index('zip_code');
        });
    }

    public function down(): void
    {
        Schema::connection('pgsql')->dropIfExists('cities');
    }
};
