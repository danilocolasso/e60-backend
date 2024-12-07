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
        Schema::create('branch_banners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('banners_id')->nullable();
            $table->unsignedBigInteger('branches_id')->nullable();

            $table->timestamps();

            $table->index('banners_id');
            $table->index('branches_id');
            $table->index(['banners_id', 'branches_id']);

            $table->foreign('banners_id')->references('id')->on('banners')->onDelete('set null');
            $table->foreign('branches_id')->references('id')->on('branchers_id')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branch_banners');
    }
};
