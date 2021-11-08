<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_models', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('provider_user_id');
            $table->string('provider');
            $table->integer('user');
            // $table->string('provider_pass',999999999);//loi
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
        Schema::dropIfExists('social_models');
    }
}
