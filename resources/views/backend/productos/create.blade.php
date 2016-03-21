@extends('aplicacion/app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-xs-8 col-xs-offset-2">
			<div class="text-center">
				<h3 class="titulo_banda_gris">
					<span>NUEVO PRODUCTO</span>
				</h3>
			</div>
			<div>
				@include('backend.productos.form',['metodo' => 'POST',
												  'titulo' => 'Nuevo Producto',
												  'accion' => ['ProductosController@store'],
												  'boton' => 'CREAR',
												  'cancelar' => action('ProductosController@index'),
				])
			</div>
		</div>
	</div>
</div>
@endsection