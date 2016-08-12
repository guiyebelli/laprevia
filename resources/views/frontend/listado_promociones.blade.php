@extends('aplicacion/app')

@section('content')
<section>
	<div class="container">
		<div class="row">			
			<div class="col-xs-10 col-xs-offset-1 transparente_BG">
				<div class="page-header">
				  <h1 class="blanco">Nuestras Promociones</h1>
				</div>

				<div class="bloque">
					@foreach($promociones as $promocion)
						<div class="caja_bloque">
							<!-- IMAGEN -->
							<div class="col-md-9">
								<img src="{{$promocion->get_imagen()}}" class="img-responsive" alt="Imagen promocion">
							</div>
							<!-- DETALLE PRODUCTO -->
							<div class="col-md-3 recuadro">
								<strong><h2 class="titulo_promo">{{$promocion}}</h2></strong>
								<p><small>{{$promocion->descripcion}}</small></p>
								<hr>
								<div class="col-md-6 linea_der">
									<h2><strong>${{$promocion->precio}}</strong></h2>
								</div>
								<div class="col-md-6">
									@include('frontend.form_add_carrito', ['objeto' => $promocion, 'accion' => 'CarritoComprasController@add_promocion'])
								</div>
							</div>
							<div class="clearfix"></div>
							<hr>
						</div>
					@endforeach
				</div>
				<div class="clearfix"></div>
			</div>

		</div>
	</div>

</section>

@endsection