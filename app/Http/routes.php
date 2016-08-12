<?php
	Route::group(['middleware' => 'web'], function() {
		require (__DIR__ . '/Routes/AuthRoutes.php');
	  require (__DIR__ . '/Routes/InicioRoutes.php');
		require (__DIR__ . '/Routes/LoginRoutes.php');
		require (__DIR__ . '/Routes/UsuariosRoutes.php');
		require (__DIR__ . '/Routes/ImagenesRoutes.php');
		require (__DIR__ . '/Routes/PromocionesRoutes.php');
		require (__DIR__ . '/Routes/ProductosRoutes.php');
		require (__DIR__ . '/Routes/CategoriasRoutes.php');
		require (__DIR__ . '/Routes/CarritoComprasRoutes.php');
	});
	
?>
