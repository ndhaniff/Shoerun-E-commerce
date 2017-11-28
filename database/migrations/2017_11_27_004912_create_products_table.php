<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('user_id');
            $table->decimal('price');
            $table->string('sku');
            $table->string('product_name');
            $table->mediumText('product_desc');
            $table->string('shipping');
            $table->string('category_id');
            $table->string('type');
            $table->string('brand');
            $table->string('size');
            $table->string('color');
            $table->string('stock');
            $table->boolean('in_stock');
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
