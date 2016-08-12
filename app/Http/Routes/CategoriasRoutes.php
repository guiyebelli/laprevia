<?php
	Route::group(['middleware' => 'auth', 'prefix' => 'administracion'], function()
	{
		// CATEGORIAS
		Route::resource('categorias','CategoriasController', ['except' => ['show']]);	
	});
?>