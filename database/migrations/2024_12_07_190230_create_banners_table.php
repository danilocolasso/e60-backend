<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('pgsql')->create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150)->nullable();
            $table->string('link', 250)->nullable();
            $table->string('image', 50)->nullable();
            $table->boolean('is_active')->default(false);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::connection('pgsql')->dropIfExists('banners');
    }
};
