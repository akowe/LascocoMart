<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDueLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('due_loans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('loan_id');
            $table->string('member_id');
            $table->string('cooperative_code');
            $table->string('monthly_due');
            $table->string('due_date');
            $table->string('payment_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('due_loans');
    }
}
