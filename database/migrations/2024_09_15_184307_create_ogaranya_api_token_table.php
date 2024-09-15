<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ogaranya_api_token', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('test_token')->nullable();
            $table->string('live_token')->nullable();
            $table->string('test_publickey')->nullable();
            $table->string('live_publickey')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ogaranya_api_token');
    }
};
