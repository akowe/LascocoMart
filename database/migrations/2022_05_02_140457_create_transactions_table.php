<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string("member_id");// cooperative member that placed the order which is been paid for
            $table->string("user_id");// cooperative user id that did the payment transaction
            $table->string("order_id");// order id for each order
           
            $table->string("authorization_code");// sames as order number
            $table->string("paystack_ref");// paystack payment reference
            $table->decimal("tran_amount");// amount paid
            $table->string("pay_status");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
