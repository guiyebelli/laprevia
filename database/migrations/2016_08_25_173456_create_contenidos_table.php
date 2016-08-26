<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContenidosTable extends Migration
{
    public function up()
    {
        Schema::create('contenidos', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('cantidad');
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('precio');
            $table->string('subtotal');
            $table->integer('pedido_id')->unsigned();
            // claves foraneas
            $table->foreign('pedido_id')
                  ->references('id')
                  ->on('pedidos');
                        
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('contenidos');
    }
}
