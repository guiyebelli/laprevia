@extends('aplicacion/app')

@section('content')

	@include('backend.productos.form',['metodo' => 'PATCH',
										'titulo' => 'EDICIÓN DE PRODUCTO',
										'accion' => ['ProductosController@update', $producto->id ],
										'boton' => 'Actualizar',
										'cancelar' => action('ProductosController@index'),
	])

@endsection