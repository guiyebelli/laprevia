@extends('aplicacion/app')

@section('content')
	@include('backend.promociones.form',['metodo' => 'POST',
									  'titulo' => 'Nueva Promoci&oacute;n',
									  'accion' => ['PromocionesController@store'],
									  'boton' => 'Crear',
									  'cancelar' => action('PromocionesController@index'),
	])
			
@endsection