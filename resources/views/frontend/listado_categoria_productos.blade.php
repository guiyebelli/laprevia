@extends('aplicacion/app')

@section('content')
<section>
	<div class="container">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 transparente_BG blanco">
				<div class="page-header">
				  <h1>Productos {{$categoria}}</h1>
				</div>
				<div class="bloque">
					@if(count($productos) > 0)
					<div class="separar_bloque">
						<div class="row">
							@foreach($productos as $producto)
								<div class="col-xs-6 col-sm-3 caja_bloque text-center">
									<p><img src="{{$producto->get_imagen()}}" class="img-circle" alt="Imagen producto" width="200" height="200"></p>
									<p> {{$producto}} </p>
									<p> <small>{{$producto->descripcion}}</small></p>
									<h4>${{$producto->precio}}</h4>

									@include('frontend.form_add_carrito', ['objeto' => $producto, 'accion' => 'CarritoComprasController@add_producto'])
								</div>
							@endforeach
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				@endif
			</div>
		</div>
	</div>
</section>
@endsection