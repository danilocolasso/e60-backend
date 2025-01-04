<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('pgsql')->create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->nullable()->constrained('branches')->onDelete('cascade');
            $table->string('name_br', 150)->nullable();
            $table->string('name_en', 150)->nullable();
            $table->string('name_es', 150)->nullable();
            $table->longText('description_br')->nullable();
            $table->longText('description_en')->nullable();
            $table->longText('description_es')->nullable();
            $table->string('image', 50)->nullable();
            $table->string('image_cover', 50)->nullable();
            $table->string('image_icon', 50)->nullable();
            $table->integer('participants_min')->default(1);
            $table->integer('participants_max')->default(1);
            $table->integer('duration_in_minutes')->default(0);
            $table->boolean('is_active')->default(false);
            $table->boolean('is_delivery')->default(false);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->boolean('multiple_participants')->default(false);
            $table->tinyText('link_room')->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->index('branch_id');
        });
    }

    public function down(): void
    {
        Schema::connection('pgsql')->dropIfExists('rooms');
    }
};
