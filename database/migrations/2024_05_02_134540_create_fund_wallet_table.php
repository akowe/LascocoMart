<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFundWalletTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fund_wallet', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('wallet_id')->nullable;
            $table->string('user_id')->nullable;
            $table->string('amount')->nullable;
            $table->string('payment_date')->nullable;
            $table->string('payment_status')->nullable;
            $table->string('payment_type')->nullable;
            $table->string('reference')->nullable;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fund_wallet');
    }
}
