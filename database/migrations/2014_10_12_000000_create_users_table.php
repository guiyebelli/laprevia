<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password', 60)->default(0);
            $table->integer('estado')->default(2);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('usuarios');
    }
}
