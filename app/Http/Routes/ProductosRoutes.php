<?php
Route::group(['middleware' => 'auth', 'prefix' => 'administracion'], function()
{
	// PRODUCTOS
	Route::resource('productos','ProductosController');
	
});
?>