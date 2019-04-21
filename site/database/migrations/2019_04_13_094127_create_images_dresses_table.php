<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesDressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images_dresses', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('image');
            $table->integer('dresses_id')->unsigned();
            $table->foreign('dresses_id')->references('id')->on('dresses');
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
        Schema::dropIfExists('images_dresses');
    }
}
