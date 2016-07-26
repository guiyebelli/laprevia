@extends('aplicacion/app')

@section('content')
	@include('backend.productos.form',['metodo' => 'POST',
									  'titulo' => 'Nuevo Producto',
									  'accion' => ['ProductosController@store'],
									  'boton' => 'Crear',
									  'cancelar' => action('ProductosController@index'),
	])
			
@endsection