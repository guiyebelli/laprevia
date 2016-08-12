@extends('aplicacion/app')

@section('content')

	@include('backend.categorias.form',['metodo' => 'PATCH',
										'titulo' => 'EDICI&Oacute;N DE CATEGOR&Iacute;A',
										'accion' => ['CategoriasController@update', $categoria->id ],
										'boton' => 'Actualizar',
										'cancelar' => action('CategoriasController@index'),
	])

@endsection