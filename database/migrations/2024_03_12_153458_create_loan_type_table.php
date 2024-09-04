<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_type', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('admin_id');
            $table->string('name');
            $table->string('percentage_rate');
            $table->string('rate_type'); 
            $table->string('guarantor');
            $table->string('min_duration');
            $table->string('max_duration');
            $table->string('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loan_type');
    }
}
