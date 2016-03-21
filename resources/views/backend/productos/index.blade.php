@extends('aplicacion/app')

@section('content')

<div class="container">
	<div class="row">

		<div class="text-center" >
			<h3>
				<span>PRODUCTOS</span>
			</h3>
			<a title="Nuevo usuario" href="{{ action('ProductosController@create') }}" class="btn btn-primary pull-right"> Nuevo</a>
		</div>


		<div class="banda_gris scroller" data-banda="altura_usuarios">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Precio</th>
						<th>Descipcion</th>
						<th>Imagen</th>
						<th class="text-center">Acciones</th>
					</tr>
				</thead>

				<tbody>
				@if(count($productos) > 0)
					@foreach($productos as $producto)
						<tr>
							<td>{{$producto->nombre}}</td>
							<td>{{$producto->precio}}</td>
							<td>{{$producto->descripcion}}</td>
							<td> - </td>
							<td>
								<a title="Editar" href="{{ action('ProductosController@edit', [$producto->id]) }}"><span data-toggle="tooltip" data-placement="bottom" class="glyphicon glyphicon-pencil"></span></a>
								<a href="{{ action('ProductosController@destroy', [$producto->id]) }}"  data-method="delete" data-confirm="¿Estas seguro que desea eliminar al producto '{{$producto}}'?"> <span title="Eliminar" data-toggle="tooltip" data-placement="bottom" class="glyphicon glyphicon-trash"></span></a>
							</td>
						</tr>
					@endforeach
				@else
					<tr class="text-center">
						<td colspan="5">NO EXISTEN PRODUCTOS EN EL SISTEMA</td>
					</tr>
				@endif

				</tbody>
			</table>
			
		</div>
	</div>
</div>

@endsection