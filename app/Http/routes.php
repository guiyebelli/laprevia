<?php
	Route::group(['middleware' => 'web'], function() {
	    require (__DIR__ . '/Routes/InicioRoutes.php');
		require (__DIR__ . '/Routes/LoginRoutes.php');
		require (__DIR__ . '/Routes/UsuariosRoutes.php');
	});
	
?>
