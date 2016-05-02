@extends('aplicacion/app')

@section('content')

<section>
	<div class="container">
		<div class="row">
			@if(count($promociones) > 0)
				@include('frontend.carousel_promociones')
			@endif

			<div class="col-xs-10 col-xs-offset-1 titular" >
				<div>
					Pedidos al (0345) 154134437
				</div>

				<div class="pull-right">
					<a href="{{ action('CarritoComprasController@index') }}" class="rojo"><span class="glyphicon glyphicon-shopping-cart" data-toggle="tooltip" data-placement="top" data-title="Mi Carrito"></span> (0)</a>
				</div>
			</div>

			<div class="col-xs-10 col-xs-offset-1 bloque">
				@if(count($productos) > 0)
					@include('frontend.listado_productos')
				@endif
			</div>

		</div>
	</div>

</section>

@endsection