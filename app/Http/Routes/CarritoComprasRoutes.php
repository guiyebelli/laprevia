<?php
	// CARRITO DE COMPRAS FRONTEND
	Route::get('micarrito', 'CarritoComprasController@index');
	Route::post('micarrito/agregar_producto/', 'CarritoComprasController@add_producto');
	Route::post('micarrito/agregar_promocion/', 'CarritoComprasController@add_promocion');
	Route::delete('micarrito/eliminar/{id}', 'CarritoComprasController@destroy');
	Route::patch('micarrito/actualizar/{id}', 'CarritoComprasController@update');
?>