<?php

Route::group(['middleware' => 'auth', 'prefix' => 'administracion'], function()
{	
	// USUARIO
	Route::resource('usuarios','UsuariosController', ['except' => ['show']]);
	Route::patch('usuarios/{id}/activar','UsuariosController@activar');
	Route::patch('usuarios/{id}/activar_pendiente','UsuariosController@activar_pendiente');
	Route::patch('usuarios/{id}/desactivar','UsuariosController@desactivar');
	Route::patch('usuarios/{id}/restablecer','UsuariosController@restablecer_contra');
	Route::get('usuarios/{id}/perfil','UsuariosController@perfil');
	Route::patch('usuarios/{id}/guardar_contra','UsuariosController@guardar_contra');
});

?>