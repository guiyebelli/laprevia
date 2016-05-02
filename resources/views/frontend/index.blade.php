@extends('aplicacion/app')

@section('content')

<section>
	<div class="container">
		<div class="row">
			@if(count($promociones) > 0)
			<div id="carousel-promociones" class="carousel slide col-xs-10 col-xs-offset-1" data-ride="carousel">
			  	
			  	<!-- Indicators -->
			  	<ol class="carousel-indicators">
				  	<?php $count = 0 ?>
					@foreach($promociones as $promocion)
						<li data-target="#carousel-promociones" data-slide-to="{{$count}}" class="{{ ($count == 0) ? 'active' : '' }}"></li>
				    	<?php $count++ ?>
				    @endforeach
			  	</ol>

			  	<!-- Wrapper for slides -->
			  	<div class="carousel-inner" role="listbox">
			  		<?php $count = 0 ?>
					@foreach($promociones as $promocion)
					    <div class="item  {{ ($count == 0) ? 'active' : '' }}">
					    	<div align="center">
					      	<img height='300' src="{{$promocion->get_imagen()}}" alt="Imagen promocion">
					    	</div>
					      <div class="carousel-caption">
					        {{$promocion}}
					      </div>
					    </div>
				    	<?php $count++ ?>
				    @endforeach
			  </div>

			  <!-- Controls -->
			  <a class="left carousel-control" href="#carousel-promociones" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    <span class="sr-only">Anterior</span>
			  </a>
			  <a class="right carousel-control" href="#carousel-promociones" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    <span class="sr-only">Siguiente</span>
			  </a>
			</div>
			@endif


			<div class="col-xs-10 col-xs-offset-1 titular" >
				<div>
					Pedidos al (0345) 154134437
				</div>

				<div class="pull-right">
					<a href=""></a>
					<a href="{{ action('CarritoComprasController@index') }}"><span class="glyphicon glyphicon-shopping-cart rojo" data-toggle="tooltip" data-placement="top" data-title="Mi Carrito"></span></a>
				</div>
			</div>

			<div class="col-xs-10 col-xs-offset-1 bloque">

				@if(count($productos) > 0)
					@foreach($productos as $producto)

						<div class="col-xs-4 blanco">

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