<?php
Route::group(['middleware' => 'auth', 'prefix' => 'administracion'], function()
{
	// PRODUCTOS
	Route::resource('productos','ProductosController', ['except' => ['show']]);
	Route::patch('productos/{id}/desactivar','ProductosController@desactivar');
	Route::patch('productos/{id}/activar','ProductosController@activar');
	Route::get('productos/cambiar_stock/{id}','ProductosController@editar_stock');
	Route::patch('productos/actualizar_stock/{id}','ProductosController@update_stock');
	
});
?>