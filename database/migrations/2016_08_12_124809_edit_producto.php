<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditProducto extends Migration
{
    public function up()
    {
        Schema::table('productos', function($table)
        {
            $table->dropColumn('tipo');

            $table->integer('stock');
            $table->integer('categoria_id')->unsigned();
            // claves foraneas
            $table->foreign('categoria_id')
                  ->references('id')
                  ->on('categorias');
        });
    }

    public function down()
    {
        //
    }
}
