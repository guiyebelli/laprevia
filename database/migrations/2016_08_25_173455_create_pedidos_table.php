<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('comprador');
            $table->string('telefono');
            $table->string('email');
            $table->string('direccion');
            $table->longText('comentario');
            $table->integer('estado');
            
            $table->string('monto');
            $table->string('total');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('pedidos');
    }
}
