<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('pgsql')->create('branch_pagseguro_credentials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->nullable()->constrained('branches')->onDelete('cascade');
            $table->string('token', 255)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('client_id', 100)->nullable();
            $table->string('client_secret', 100)->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->index('branch_id');
        });
    }

    public function down(): void
    {
        Schema::connection('pgsql')->dropIfExists('branch_pagseguro_credentials');
    }
};
