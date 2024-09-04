<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCooperativeRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cooperative_role', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('cooperative_code')->nullable();
            $table->string('member_id')->nullable();
            $table->string('member_role')->nullable();
            $table->string('member_role_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cooperative_role');
    }
}
