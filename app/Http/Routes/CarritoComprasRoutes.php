<?php
	// CARRITO DE COMPRAS FRONTEND
	Route::get('micarrito', 'CarritoComprasController@index');
	Route::post('micarrito/agregar_producto/', 'CarritoComprasController@add_producto');
	Route::post('micarrito/agregar_promocion/', 'CarritoComprasController@add_promocion');
	Route::post('micarrito/actualizar/promocion', 'CarritoComprasController@update_promocion');
	Route::post('micarrito/actualizar/producto', 'CarritoComprasController@update_producto');
	Route::delete('micarrito/eliminar/{id}', 'CarritoComprasController@destroy');
	Route::get('micarrito/vaciar', 'CarritoComprasController@empty_cart');
	Route::get('micarrito/enviar_pedido', 'CarritoComprasController@send');
	Route::post('micarrito/realizarpedido', 'CarritoComprasController@make_order');
?>