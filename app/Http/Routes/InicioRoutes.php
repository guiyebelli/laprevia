<?php
	// FRONTEND
	Route::get('/', 'InicioController@index');
	Route::get('/promociones', 'InicioController@promociones');
	Route::get('/productos', 'InicioController@productos');
	Route::get('/categoria/{id}/productos', 'InicioController@categoria_producto');
?>