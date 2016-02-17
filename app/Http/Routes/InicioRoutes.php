<?php
	// FRONTEND
	Route::group(['middleware' => 'guest'], function()
	{
		Route::get('/', 'InicioController@index');
	});
?>