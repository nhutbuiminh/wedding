<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('dress_type');
            $table->string('color')->nullable();
            $table->longText('image')->nullable();
            $table->longText('description')->nullable();
            $table->double('price')->nullable();
             $table->integer('category_services_id')->unsigned();
             $table->foreign('category_services_id')->references('id')->on('category_services');
            
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
        Schema::dropIfExists('dresses');
    }
}
