<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanRepaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_repayment', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('loan_id');
            $table->string('member_id');
            $table->string('cooperative_code');
            $table->string('loan_type_id');
            $table->string('monthly_principal');
            $table->string('monthly_interest');
            $table->string('monthly_due');
            $table->string('amount_paid')->nullable();
            $table->string('pay_status')->nullable();
            $table->string('payment_date')->nullable();
            $table->string('monthly_due_date')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loan_repayment');
    }
}
