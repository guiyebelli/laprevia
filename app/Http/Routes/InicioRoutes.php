<?php
	// FRONTEND
	Route::get('/', 'InicioController@index');
	Route::get('/promociones', 'InicioController@promociones');
	Route::get('/productos', 'InicioController@productos');
?>