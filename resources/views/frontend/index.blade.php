@extends('aplicacion/app')

@section('content')
<script src="{{ asset('js/sumar_carrito.js') }}"></script>

<section>
	<div class="container">
		<div class="row">
			@if(count($promociones) > 0)
				@include('frontend.carousel_promociones')
			@endif
				
			<div class="col-xs-10 col-xs-offset-1 bloque">
				@if(count($productos) > 0)
					<div class="productos">
						<div class="row transparente_BG blanco">
						@foreach($productos as $producto)
							<div class="col-xs-6 col-sm-3 caja_producto text-center">
								<p><img src="{{$producto->get_imagen()}}" class="img-circle" alt="Imagen producto" width="200" height="200"></p>
								<p> {{$producto}} </p>
								<p> <small>{{$producto->descripcion}}</small></p>
								<h4>${{$producto->precio}}</h4>
								<div>
									{!! Form::model($producto, array('action' => ['CarritoComprasController@add_producto'], 'method' => 'POST')) !!}
										
										<div class="form-group">
											{{ Form::hidden('producto_id', $producto->id, array('id' => 'producto_id')) }}
											{{ Form::hidden('cantidad', 1, array('id' => 'cantidad')) }}
											{{ Form::button('&lt;', array('class'=>'btn btn-negro boton_restar', 'type'=>'button')) }} <span>1</span> {{ Form::button('>', array('class'=>'btn btn-negro boton_sumar', 'type'=>'button')) }}
										</div>

										{{ Form::button('+<span class="glyphicon glyphicon-shopping-cart"></span>',	array('class'=>'btn btn-rojo','type'=>'submit')) }}
									{!! Form::close() !!}
								</div>
							</div>
						@endforeach
						</div>
					</div>
					<div class="clearfix"></div>
				@endif
			</div>

		</div>
	</div>

</section>

@endsection