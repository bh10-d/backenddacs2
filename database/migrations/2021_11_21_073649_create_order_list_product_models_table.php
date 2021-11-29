<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderListProductModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_list_product', function (Blueprint $table) {
            $table->integer('CodeOrder');
            $table->integer('IdProduct');
            $table->string('NameProduct',100);
            $table->integer('Quantity');
            $table->string('Price',50);
            $table->integer('Time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_list_product');
    }
}
