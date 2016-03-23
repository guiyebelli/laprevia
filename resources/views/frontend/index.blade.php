@extends('aplicacion/app')

@section('content')

<section>
	<div class="container">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 titular" >
				<div>
					(0345) 154134437
				</div>

				<div class="pull-right">
					Tu pedido:
				</div>
			</div>

			<div class="col-xs-10 col-xs-offset-1">

				@if(count($productos) > 0)
					@foreach($productos as $producto)

						<div class="col-xs-4 bloque blanco">

							<p> {{$producto}} </p>
							<p><img src="{{$producto->get_imagen()}}" class="img-thumbnail" alt="Imagen producto"></p>
							<p class="text-left">{{$producto->descripcion}}</p>
							<p class="text-right">${{$producto->precio}}</p>

						</div>

					@endforeach
				@endif


			</div>

		</div>
	</div>

</section>

@endsection