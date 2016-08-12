<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategorias extends Migration
{
  public function up()
  {
    Schema::create('categorias', function (Blueprint $table)
    {
      $table->increments('id');
      $table->string('nombre');
      $table->string('imagen');
      
      $table->timestamps();
    });
  }

  public function down()
  {
  	Schema::drop('categorias');
  }
}
