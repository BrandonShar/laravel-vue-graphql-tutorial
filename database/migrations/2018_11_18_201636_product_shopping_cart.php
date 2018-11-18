<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductShoppingCart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_shopping_cart', function (Blueprint $table) {
            $table->integer('product_id');
            $table->integer('shopping_cart_id');
            $table->tinyInteger('quantity')->unsigned()->default(1);

            $table->index(['shopping_cart_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_shopping_list');
    }
}
