@extends('aplicacion/app')

@section('content')

<div class="container">
	<div class="row transparente_BG blanco">

		<div class="col-xs-12 text-center">
			<h3><span>PROMOCIONES</span></h3>
			<a title="Nuevo usuario" href="{{ action('PromocionesController@create') }}" class="btn btn-rojo pull-right"> Nuevo</a>
		</div>

		<div class="col-xs-12">
			<table class="table">
				<thead>
					<tr>
						<th></th>
						<th class="text-center">Stock</th>
						<th>Inicio</th>
						<th>Nombre</th>
						<th>Descipcion</th>
						<th>Precio</th>
						<th>Imagen</th>
						<th class="text-right">Acciones</th>
					</tr>
				</thead>

				<tbody>
					@if(count($promociones) > 0)
						@foreach($promociones as $promocion)
							<tr>
								<td class="text-center">
									@if($promocion->estado == 0)
										<a href="{{ action('PromocionesController@activar', [$promocion->id]) }}" data-method="patch" data-title="Activación de promocion" data-confirm="¿Esta seguro que desea activar al promocion '{{$promocion}}'?"><span class="glyphicon glyphicon-remove-circle rojo" data-toggle="tooltip" data-placement="top" data-title="Activar"></span></a>
									@elseif($promocion->estado == 1)
										<a href="{{ action('PromocionesController@desactivar', [$promocion->id]) }}" data-method="patch" data-title="Desactivación de promocion" data-confirm="¿Esta seguro que desea desactivar al promocion '{{$promocion}}'?"><span class="glyphicon glyphicon-ok-circle verde" data-toggle="tooltip" data-placement="top" data-title="Desactivar"></span></a>
									@endif
									</a>
								</td>
								<td class="text-center">{{$promocion->stock}}</td>
								<td class="text-center">{{($promocion->visible == 0) ? 'Si' : 'No'}}</td>
								<td>{{$promocion->nombre}}</td>
								<td>{{$promocion->descripcion}}</td>
								<td><strong class="tachado">${{$promocion->precio_original}}</strong> <h4>${{$promocion->precio}}</h4> </td>
								<td class="col-xs-1"> 
									<img src="{{$promocion->get_imagen()}}" class="img-thumbnail" alt="Imagen promocion">
								</td>
								<td class="text-right">
									<a href="{{ action('PromocionesController@edit', [$promocion->id]) }}"><span data-toggle="tooltip" data-placement="top" data-title="Editar" class="glyphicon glyphicon-pencil blanco"></span></a>
									<a href="{{ action('PromocionesController@destroy', [$promocion->id]) }}"  data-method="delete" data-confirm="¿Estas seguro que desea eliminar al promocion '{{$promocion}}'?"> <span title="Eliminar" data-toggle="tooltip" data-placement="top" class="glyphicon glyphicon-trash blanco"></span></a>
								</td>
							</tr>
						@endforeach
					@else
						<tr class="text-center">
							<td colspan="7">NO EXISTEN PROMOCIONES EN EL SISTEMA</td>
						</tr>
					@endif
				</tbody>
			</table>
			
		</div>
	</div>
</div>

@endsection

