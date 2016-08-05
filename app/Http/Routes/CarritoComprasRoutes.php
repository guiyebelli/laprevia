<?php
	// CARRITO DE COMPRAS FRONTEND
	Route::get('micarrito', 'CarritoComprasController@index');
	Route::post('micarrito/agregar_producto/', 'CarritoComprasController@add_producto');
?>