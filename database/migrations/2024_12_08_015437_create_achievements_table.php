<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('pgsql')->create('achievements', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45);
            $table->string('description', 45);
            $table->string('logo', 45);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::connection('pgsql')->dropIfExists('achievements');
    }
};
