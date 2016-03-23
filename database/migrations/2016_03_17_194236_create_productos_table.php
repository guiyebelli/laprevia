<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    public function up()
    {
        Schema::create('productos', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('precio');
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('imagen');
            $table->integer('estado');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('productos');
    }
}
