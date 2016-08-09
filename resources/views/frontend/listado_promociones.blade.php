@extends('aplicacion/app')

@section('content')

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