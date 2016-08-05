@extends('aplicacion/app')

@section('content')

<section>
	<div class="container">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 bloque">
				<div class="carrito">
					<div class="row transparente_BG blanco">
						<div class="col-xs-12">
							<table class="table">
								<thead>
									<tr>
										<th>Nombre</th>
										<th class="text-center">Cantidad</th>
										<th class="text-center">Precio</th>
										<th class="text-right">Acciones</th>
									</tr>
								</thead>

								<tbody>
									@if(count($carrito) > 0)
										@foreach($carrito as $producto)
											<tr>
												<td>{{$producto->name}}</td>
												<td class="text-center">{{$producto->qty}}</td>
												<td class="text-center">${{$producto->price}}</td>
												<td class="text-right">
													<!-- <a href="{{ action('ProductosController@destroy', [$producto->id]) }}"  data-method="delete" data-confirm="¿Estas seguro que desea eliminar al producto '{{$producto}}'?"> <span title="Eliminar" data-toggle="tooltip" data-placement="top" class="glyphicon glyphicon-trash blanco"></span></a> -->
												</td>
											</tr>
										@endforeach
									@else
										<tr class="text-center">
											<td colspan="4">A&Uacute;N NO HA AGREGADO PRODUCTOS/PROMOCIONES </td>
										</tr>
									@endif
								</tbody>
							</table>
					</div>
				</div>
			</div>
		</div>
	</div>

</section>

@endsection