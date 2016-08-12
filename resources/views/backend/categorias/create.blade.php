@extends('aplicacion/app')

@section('content')
	@include('backend.categorias.form',['metodo' => 'POST',
									  'titulo' => 'Nueva Categoria',
									  'accion' => ['CategoriasController@store'],
									  'boton' => 'Crear',
									  'cancelar' => action('CategoriasController@index'),
	])
			
@endsection