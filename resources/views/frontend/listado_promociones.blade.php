@extends('aplicacion/app')

@section('content')
<script src="{{ asset('js/sumar_carrito.js') }}"></script>
<section>
	<div class="container">
		<div class="row">			
			<div class="col-xs-10 col-xs-offset-1 bloque">
				<div class="promociones">
					<div class="row transparente_BG blanco">
					@foreach($promociones as $promocion)
					<div class="caja_producto">
						<div class="col-xs-8">
							<p><img src="{{$promocion->get_imagen()}}" class="img-responsive" alt="Imagen promocion"></p>
						</div>
						<div class="col-xs-4">
							<strong>
								<p><h3>{{$promocion}}</h3></p>
								<p><h1 class="text-center">${{$promocion->precio}}</h1></p>
								<p>Incluye:</p>	
							</strong>
							<p><small>{{$promocion->descripcion}}</small></p>
							<div>
								{!! Form::model($producto, array('action' => ['CarritoComprasController@add_promocion'], 'method' => 'POST')) !!}
									
									<div class="form-group">
										{{ Form::hidden('promocion_id', $producto->id, array('id' => 'promocion_id')) }}
										{{ Form::hidden('cantidad', 1, array('id' => 'cantidad')) }}
										{{ Form::button('&lt;', array('class'=>'btn btn-negro boton_restar', 'type'=>'button')) }} <span>1</span> {{ Form::button('>', array('class'=>'btn btn-negro boton_sumar', 'type'=>'button')) }}
									</div>

									{{ Form::button('+<span class="glyphicon glyphicon-shopping-cart"></span>',	array('class'=>'btn btn-rojo','type'=>'submit')) }}
								{!! Form::close() !!}
							</div>
						</div>
					</div>
					@endforeach
				</div>
				<div class="clearfix"></div>
			</div>

		</div>
	</div>

</section>

@endsection