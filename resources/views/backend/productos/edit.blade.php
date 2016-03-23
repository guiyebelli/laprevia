@extends('aplicacion/app')

@section('content')

	@include('backend.productos.form',['metodo' => 'PATCH',
										'titulo' => 'EDICIÓN DE PRODUCTO',
										'accion' => ['ProductosController@update', $producto->id ],
										'boton' => 'ACTUALIZAR',
										'cancelar' => action('ProductosController@index'),
	])

@endsection