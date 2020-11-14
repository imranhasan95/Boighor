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
            $table->string('product_name', 100);
            $table->longText('products_shot_details')->nullable();
            $table->longText('products_long_details')->nullable();
            $table->integer('category_id');
            $table->integer('product_price');
            $table->integer('product_quantity');
            $table->integer('alert_uantity');
            $table->longText('product_photo')->default('defaultproductphoto.jpg');
            $table->timestamps();
            $table->softDeletes();
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
