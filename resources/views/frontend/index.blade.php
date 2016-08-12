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
				@if(count($categorias) > 0)
					<div class="separar_bloque">
						<div class="row transparente_BG blanco">
						@foreach($categorias as $categoria)
							@if(count($categoria->productos) > 0)
								<div class="col-xs-12 col-sm-4 caja_bloque text-center">
									<a href="{{ action('InicioController@categoria_producto', [$categoria->id]) }}">
										<p><img src="{{$categoria->get_imagen()}}" class="img-circle" alt="Imagen categoria" width="200" height="200"></p>
									</a>
									<p> {{$categoria}} </p>
								</div>
							@endif
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