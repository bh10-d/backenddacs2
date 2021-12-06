<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminProductModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_product_models', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('productname',100);
            $table->string('productcate',50);
            $table->bigInteger('price');
            $table->bigInteger('quantity');
            $table->longText('description');
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
        Schema::dropIfExists('admin_product_models');
    }
}
