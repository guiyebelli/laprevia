@extends('aplicacion/app')

@section('content')

<div class="container">
	<div class="row transparente_BG blanco">

		<div class="col-xs-12 text-center" >
			<h3><span>PRODUCTOS</span></h3>
			<a title="Nuevo usuario" href="{{ action('ProductosController@create') }}" class="btn btn-rojo pull-right"> Nuevo</a>
		</div>

		<div class="col-xs-12">
			<table class="table">
				<thead>
					<tr>
						<th></th>
						<th class="text-center">Stock</th>
						<th>Categor&iacute;a</th>
						<th>Nombre</th>
						<th>Descripci&oacute;n</th>
						<th>Precio</th>
						<th>Imagen</th>
						<th class="text-right">Acciones</th>
					</tr>
				</thead>

				<tbody>
					@if(count($productos) > 0)
						@foreach($productos as $producto)
							<tr>
								<td class="text-center">
									@if($producto->estado == 0)
										<a href="{{ action('ProductosController@activar', [$producto->id]) }}" data-method="patch" data-title="Activación de producto" data-confirm="¿Esta seguro que desea activar al producto '{{$producto}}'?"><span class="glyphicon glyphicon-remove-circle rojo" data-toggle="tooltip" data-placement="top" data-title="Activar"></span></a>
									@elseif($producto->estado == 1)
										<a href="{{ action('ProductosController@desactivar', [$producto->id]) }}" data-method="patch" data-title="Desactivación de producto" data-confirm="¿Esta seguro que desea desactivar al producto '{{$producto}}'?"><span class="glyphicon glyphicon-ok-circle verde" data-toggle="tooltip" data-placement="top" data-title="Desactivar"></span></a>
									@endif
									</a>
								</td>
								<td class="text-center">
									<a class="modal-view" href="{{ action('ProductosController@editar_stock', [$producto->id]) }}" data-toggle="tooltip" data-placement="top" data-title="Cambiar stock">{{$producto->stock}}</a>
								</td>
								<td>{{$producto->categoria}}</td>
								<td>{{$producto->nombre}}</td>
								<td>{{$producto->descripcion}}</td>
								<td>${{$producto->precio}}</td>
								<td class="col-xs-1"> 
									<img src="{{$producto->get_imagen()}}" class="img-thumbnail" alt="Imagen producto">
								</td>
								<td class="text-right">
									<a href="{{ action('ProductosController@edit', [$producto->id]) }}"><span data-toggle="tooltip" data-placement="top" data-title="Editar" class="glyphicon glyphicon-pencil blanco"></span></a>
									<a href="{{ action('ProductosController@destroy', [$producto->id]) }}"  data-method="delete" data-confirm="¿Estas seguro que desea eliminar al producto '{{$producto}}'?"> <span title="Eliminar" data-toggle="tooltip" data-placement="top" class="glyphicon glyphicon-trash blanco"></span></a>
								</td>
							</tr>
						@endforeach
					@else
						<tr class="text-center">
							<td colspan="8">NO EXISTEN PRODUCTOS EN EL SISTEMA</td>
						</tr>
					@endif
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection