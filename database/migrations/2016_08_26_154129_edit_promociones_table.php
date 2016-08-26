<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditPromocionesTable extends Migration
{
    public function up()
    {
        Schema::table('promociones', function($table)
        {
            $table->integer('stock');
        });
    }

    public function down()
    {
        //
    }
}
