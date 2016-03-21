<?php
Route::group(['middleware' => 'auth', 'prefix' => 'administracion'], function()
{
	// IMAGENES
	Route::resource('imagenes','ImagenesController');
	
});
?>