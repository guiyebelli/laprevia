@extends('aplicacion/app')

@section('content')

	@include('backend.promociones.form',['metodo' => 'PATCH',
										'titulo' => 'EDICI&Oacute;N DE PROMOCI&Oacute;N',
										'accion' => ['PromocionesController@update', $promocion->id ],
										'boton' => 'Actualizar',
										'cancelar' => action('PromocionesController@index'),
	])

@endsection