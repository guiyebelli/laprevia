<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTipoToProducto extends Migration
{
    public function up()
    {
        Schema::table('productos', function($table)
        {
            $table->integer('tipo');
        });
    }

    public function down()
    {
        //
    }
}
