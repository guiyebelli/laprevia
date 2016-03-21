<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromocionesTable extends Migration
{
    public function up()
    {
        Schema::create('promociones', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('precio');
            $table->string('precio_original');
            $table->string('nombre');
            $table->string('descripcion');
            $table->integer('imagen_id')->unsigned();
            $table->foreign('imagen_id')->references('id')->on('imagenes');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('promociones');
    }
}
