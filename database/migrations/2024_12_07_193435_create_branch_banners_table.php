<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('pgsql')->create('branch_banners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('banner_id')->nullable()->constrained('banners')->onDelete('cascade');
            $table->foreignId('branch_id')->nullable()->constrained('branches')->onDelete('cascade');

            $table->timestamps();

            $table->index('banner_id');
            $table->index('branch_id');
            $table->index(['banner_id', 'branch_id']);
        });
    }

    public function down(): void
    {
        Schema::connection('pgsql')->dropIfExists('branch_banners');
    }
};
