<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("cat_id");
            $table->string("prod_name");
            $table->string("quantity");
            $table->string('prod_brand')->nullable();
            $table->text("description")->nullable();
            $table->decimal("old_price")->nullable();
            $table->decimal("seller_price");
            $table->decimal("price");

            $table->string("image");
            $table->string("img1")->nullable();
            $table->string("img2")->nullable();
            $table->string("img3")->nullable();
            $table->string("img4")->nullable();
            $table->string("seller_id");
            $table->string("prod_status");
            
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
        Schema::dropIfExists('products');
    }
}
