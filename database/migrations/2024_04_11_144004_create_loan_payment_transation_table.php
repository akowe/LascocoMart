<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanPaymentTransationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_payment_transation', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('cooperative_code');
            $table->string('member_id');
            $table->string('due_loan_id');
            $table->string('amount');
            $table->string('reference');
            $table->string('authorization_code');
            $table->string('status');
            $table->string('pay_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loan_payment_transation');
    }
}
