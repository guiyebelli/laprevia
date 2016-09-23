<?php
Route::group(['middleware' => 'auth', 'prefix' => 'administracion'], function()
{
	// pedidos
	Route::resource('pedidos','PedidosController', ['only' => ['index']]);
	Route::get('pedidos/{id}/cambiar_estado','PedidosController@cambiar_estado');
	Route::patch('pedidos/{id}/guardar_estado','PedidosController@update_estado');
	
});
?>