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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable();
            $table->string('cpf', 20)->nullable();
            $table->date('birth_date')->nullable();
            $table->string('street', 100)->nullable();
            $table->string('number', 10)->nullable();
            $table->string('complement', 100)->nullable();
            $table->string('district', 50)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('state', 2)->nullable();
            $table->string('zip_code', 9)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('password', 50)->nullable();
            $table->string('number_mobile', 20)->nullable();
            $table->string('number_phone', 20)->nullable();
            $table->boolean('news_subscription')->default(false);
            $table->boolean('is_corporate')->default(false);
            $table->longText('contact_json')->nullable();
            $table->unsignedBigInteger('branches_id')->nullable();
            $table->string('rdstation_message', 250)->nullable();
            $table->timestamp('rdstation_timestamp')->nullable();
            $table->string('rdstation_uuid', 100)->default('');
            $table->string('invitation_code', 10)->nullable();
            $table->integer('invitation_used')->default(0);
            $table->string('achievements', 100)->nullable();
            $table->string('username', 50)->nullable();
            $table->string('image_url', 70)->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->index('name');
            $table->index('cpf');
            $table->index('email');
            $table->index('username');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
