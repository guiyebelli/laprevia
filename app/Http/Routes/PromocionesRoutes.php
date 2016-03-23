<?php
Route::group(['middleware' => 'auth', 'prefix' => 'administracion'], function()
{
	// PROMOCIONES
	Route::resource('promociones','PromocionesController', ['except' => ['show']]);
	Route::patch('promociones/{id}/desactivar','PromocionesController@desactivar');
	Route::patch('promociones/{id}/activar','PromocionesController@activar');
	
});
?>