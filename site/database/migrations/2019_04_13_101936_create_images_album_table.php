<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesAlbumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images_album', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('image');
            $table->integer('photography_services_id')->unsigned();
            $table->foreign('photography_services_id')->references('id')->on('photography_services');
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
        Schema::dropIfExists('images_album');
    }
}
