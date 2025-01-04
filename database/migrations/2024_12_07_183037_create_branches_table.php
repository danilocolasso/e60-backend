<?php

use App\Enums\BranchRoles;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('pgsql')->create('branches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->enum('type', array_column(BranchRoles::cases(), 'value'))->default(BranchRoles::ESCAPE);
            $table->string('name', 50);
            $table->string('phone', 50);
            $table->boolean('is_active')->default(false);
            $table->string('street', 100)->nullable();
            $table->string('number', 10)->nullable();
            $table->string('complement')->nullable();
            $table->string('district')->nullable();
            $table->string('city_code', 20)->nullable();
            $table->string('zip_code', 9)->nullable();
            $table->string('state', 2)->nullable();
            $table->tinyText('address')->nullable();
            $table->string('cnpj', 14)->nullable();
            $table->string('municipal_registration', 8)->nullable();
            $table->longText('progressive_discount_json')->nullable();
            $table->boolean('is_advance_voucher')->default(false);

            $table->softDeletes();
            $table->timestamps();

            $table->index('name');
        });
    }

    public function down(): void
    {
        Schema::connection('pgsql')->dropIfExists('branches');
    }
};
