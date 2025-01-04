<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
       Schema::connection('pgsql')->create('branch_paypal_credentials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->nullable()->constrained('branches')->onDelete('cascade');
            $table->string('user', 100)->nullable();
            $table->string('password', 100)->nullable();
            $table->string('signature', 255)->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->index('branch_id');
        });
    }

    public function down(): void
    {
       Schema::connection('pgsql')->dropIfExists('branch_paypal_credentials');
    }
};
