<?php

use App\Enums\UserRoles;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('pgsql')->create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->enum('role', array_column(UserRoles::cases(), 'value'))->after('password')->default(UserRoles::USER);
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('management_report_show')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::connection('pgsql')->create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::connection('pgsql')->create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    public function down(): void
    {
        Schema::connection('pgsql')->dropIfExists('users');
        Schema::connection('pgsql')->dropIfExists('password_reset_tokens');
        Schema::connection('pgsql')->dropIfExists('sessions');
    }
};
