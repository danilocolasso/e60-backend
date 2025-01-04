<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        // Schema::connection('pgsql')->create('bookings', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('branch_id')->nullable();
        //     $table->unsignedBigInteger('customer_id')->nullable();
        //     $table->unsignedBigInteger('room_id')->nullable();
        //     $table->unsignedBigInteger('room_schedule_id')->nullable();
        //     $table->unsignedBigInteger('proposal_id')->nullable();
        //     $table->unsignedInteger('participants')->nullable();
        //     $table->double('amount')->nullable();
        //     $table->date('due_date')->nullable();
        //     $table->string('status', 30)->default('AWAITING PAYMENT');
        //     $table->string('language', 3)->default('br');

        //     $table->string('pagseguro_url', 500)->nullable();
        //     $table->dateTime('pagseguro_url_date')->nullable();

        //     $table->string('paypal_url', 500)->nullable();
        //     $table->dateTime('paypal_url_date')->nullable();

        //     $table->char('deleted', 1)->default('N');


        //     $table->string('payment_method', 20)->nullable();

        //     $table->string('nfe_status', 20)->nullable();

        //     $table->string('pagseguro_return', 100)->default('');
        //     $table->dateTime('payment_date')->nullable();

        //     $table->enum('type', [
        //         'loose',
        //         'corporate',
        //         'courtesy',
        //         'delivery',
        //         'special',
        //         'party',
        //         'online-party',
        //         'online-hh',
        //         'press',
        //         'online',
        //         'educational'
        //     ])->default('single');

        //     $table->string('pagseguro_code', 100)->nullable();

        //     $table->unsignedBigInteger('rps_id')->default(0);
        //     $table->string('party_code', 20)->nullable();
        //     $table->string('party_title', 100)->nullable();
        //     $table->tinyText('history')->nullable();
        //     $table->char('email_event_sent', 1)->default('N');
        //     $table->double('paid_amount')->default(0);
        //     $table->bigInteger('rps_number')->default(0);
        //     $table->tinyText('invoice_description')->nullable();
        //     $table->unsignedInteger('participant_quantity')->nullable();
        //     $table->string('invoice_number', 50)->charset('latin1')->collation('latin1_swedish_ci')->default('');
        //     $table->date('issue_date')->nullable();
        //     $table->char('edit_invoice_number', 1)->default('S');
        //     $table->double('student_amount')->nullable();
        //     $table->double('participant_amount')->nullable();
        //     $table->double('snack_amount')->nullable();
        //     $table->double('transport_amount')->nullable();
        //     $table->unsignedInteger('student_quantity')->nullable();
        //     $table->unsignedInteger('snack_quantity')->nullable();
        //     $table->unsignedInteger('transport_quantity')->nullable();
        //     $table->unsignedInteger('person_item_quantity')->default(0);
        //     $table->unsignedInteger('room_item_quantity')->default(0);
        //     $table->unsignedInteger('monitoring_item_quantity')->default(0);
        //     $table->unsignedInteger('consultant_item_quantity')->default(0);
        //     $table->unsignedInteger('waitress_item_quantity')->default(0);
        //     $table->unsignedInteger('party_kit_item_quantity')->default(0);
        //     $table->unsignedInteger('coffee_item_quantity')->default(0);
        //     $table->double('person_item_value')->default(0);
        //     $table->double('room_item_value')->default(0);
        //     $table->double('monitoring_item_value')->default(0);
        //     $table->double('consultant_item_value')->default(0);
        //     $table->double('waitress_item_value')->default(0);
        //     $table->double('party_kit_item_value')->default(0);
        //     $table->double('coffee_item_value')->default(0);
        //     $table->double('other_item_value')->default(0);
        //     $table->double('opening_fee_item_value')->default(0);
        //     $table->tinyText('other_item_description')->nullable();
        //     $table->bigInteger('user_registration_id')->default(0);
        //     $table->double('happyhour_item_value')->default(0);
        //     $table->double('cleaning_item_value')->default(0);
        //     $table->double('lunch_item_value')->default(0);
        //     $table->string('coffee_schedule_description', 255)->default('');
        //     $table->string('extra_room_schedule_description', 255)->default('');
        //     $table->string('enotas_nfeid', 250)->default('');
        //     $table->string('customized_standard', 20)->nullable();
        //     $table->char('scenography', 1)->default('N');
        //     $table->string('event_schedule', 200)->nullable();
        //     $table->unsignedInteger('monitors')->default(0);
        //     $table->date('event_date')->nullable();
        //     $table->string('product', 50)->nullable();
        //     $table->double('amount_to_pay')->nullable();
        //     $table->string('used_coupon', 45)->nullable();
        //     $table->unsignedInteger('giftcard_flag')->nullable();
        //     $table->string('discount_type', 45)->nullable();

        //     $table->timestamps();

        // $table->foreignId('branch_id')->constrained();
        // });
    }

    public function down(): void
    {
        Schema::connection('pgsql')->dropIfExists('bookings');
    }
};
