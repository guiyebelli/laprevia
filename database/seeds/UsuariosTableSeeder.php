<?php

use Illuminate\Database\Seeder;

class UsuariosTableSeeder extends Seeder
{
	public function run()
	{
		\DB::table('usuarios')->insert(array(
											'nombre' => 'Guillermina',
											'apellido' => 'Belli',
											'email' => 'belliguille@gmail.com',
											'username' => 'guillermina.belli',
											'password' => \Hash::make('super'),
											'estado' => 1
			)
		);
	}
	
}

?>