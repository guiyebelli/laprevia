<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagenesTable extends Migration
{

    public function up()
    {
        Schema::create('imagenes', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('nombre');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('imagenes');
    }
}
