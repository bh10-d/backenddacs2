<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment', function (Blueprint $table) {
            // $table->id();
            $table->id('CodeOrder');
            $table->integer('IdUser');
            $table->string('NameUser',50);
            $table->bigInteger('PhoneUser');
            $table->string('AddressUser',100);
            $table->string('TypePayment',20);
            $table->integer('Time');
            $table->string('Status',50);
            $table->string('Coupon',10);
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment');
    }
}
