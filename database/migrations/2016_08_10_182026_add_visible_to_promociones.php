<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVisibleToPromociones extends Migration
{
    public function up()
    {
        Schema::table('promociones', function($table)
        {
            $table->integer('visible');
        });
    }

    public function down()
    {
        //
    }
}
