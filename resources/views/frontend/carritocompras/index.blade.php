@extends('aplicacion/app')

@section('content')

<section>
	
	<div class="container">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 bloque">
				<div class="carrito">
					<div class="row transparente_BG blanco">
						<div class="col-xs-12">

						  <h1>Mi carrito</h1>

							<table class="table">
								<thead>
									<tr>
										<th></th>
										<th>Nombre</th>
										<th class="text-center">Cantidad</th>
										<th class="text-center">Precio</th>
										<th class="text-center">SubTotal</th>
									</tr>
								</thead>

								<tbody>
									@if(count($carrito) > 0)
										@foreach($carrito as $producto)
											<tr>
												<td class="text-center">
													<a href="{{ action('CarritoComprasController@destroy', [$producto->id]) }}"  data-method="delete" data-confirm="¿Estas seguro que desea eliminar el producto '{{$producto->name}}' del carrito de compras?"> <span title="Eliminar del carrito" data-toggle="tooltip" data-placement="top" class="glyphicon glyphicon-remove blanco"></span></a>
												</td>
												<td>{{$producto->name}}</td>
												<td class="text-center">{{$producto->qty}}</td>
												<td class="text-center">${{$producto->price}}</td>
												<td class="text-center">${{$producto->subtotal}}</td>
											</tr>
										@endforeach
										<hr>
										<tr class="text-right">
											<td colspan="3"></td>
											<td class="text-center"><strong>TOTAL:</strong></td>
											<td class="text-center"> ${{$total}} </td>
										</tr>
									@else
										<tr class="text-center">
											<td colspan="5">A&Uacute;N NO HA AGREGADO PRODUCTOS/PROMOCIONES </td>
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