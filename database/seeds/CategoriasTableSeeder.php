<?php

use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
	public function run()
	{
		\DB::table('categorias')->insert(
			array(
				'nombre' => 'Aperitivos',
				'imagen' => 'aper.jpg',
			),
			array(
				'nombre' => 'Espumantes',
				'imagen' => 'cp.jpg',
			),
			array(
				'nombre' => 'Blancas',
				'imagen' => 'teq.jpg',
			),
			array(
				'nombre' => 'Alcoholicas',
				'imagen' => 'cerveza.jpg',
			),
			array(
				'nombre' => 'Sin alcohol',
				'imagen' => 'gaseosa-bebida.jpg',
			),
			array(
				'nombre' => 'Otros',
				'imagen' => 'puchois.jpg',
			),
		);
	}
	
}

?>