<?php
Route::group(['middleware' => 'auth', 'prefix' => 'administracion'], function()
{
	// PRODUCTOS
	Route::resource('productos','ProductosController', ['except' => ['show']]);
	Route::patch('productos/{id}/desactivar','ProductosController@desactivar');
	Route::patch('productos/{id}/activar','ProductosController@activar');
	
});
?>