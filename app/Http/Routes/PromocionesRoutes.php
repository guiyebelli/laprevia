<?php
Route::group(['middleware' => 'auth', 'prefix' => 'administracion'], function()
{
	// PROMOCIONES
	Route::resource('promociones','PromocionesController');
	
});
?>