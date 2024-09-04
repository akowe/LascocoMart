<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashTransferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash_transfer', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('transfer_date')->nullable();
            $table->string('transfer_id')->nullable();
            $table->string('wallet_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('reference')->nullable();
            $table->string('recipient')->nullable();
            $table->string('amount')->nullable();
            $table->string('transfer_code')->nullable();
            $table->string('currency')->nullable();
            $table->string('status')->nullable();
            $table->string('integration')->nullable();
            $table->string('domain')->nullable();
            $table->string('type')->nullable();
            $table->string('name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('account_name')->nullable();
            $table->string('bank_code')->nullable();
            $table->string('bank_name')->nullable();
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cash_transfer');
    }
}
