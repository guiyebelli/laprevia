<?php
	// CARRITO DE COMPRAS FRONTEND
	Route::get('micarrito', 'CarritoComprasController@index');
	Route::post('micarrito/{id_producto}', 'CarritoComprasController@add');
?>