<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('admin_id')->nullable();
            $table->string('cooperative_code');
            $table->string('member_id');
            $table->string('loan_type_id');
            $table->string('principal');
            $table->string('interest');
            $table->string('total');
            $table->string('loan_balance')->nullable();
            $table->string('duration');
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('loan_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loan');
    }
}
