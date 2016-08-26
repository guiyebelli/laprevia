@extends('aplicacion/app')

@section('content')
<script src="{{ asset('js/lista_carrito.js') }}"></script>

<section>
	
	<div class="container">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 bloque">
				<div class="carrito">
					<div class="row transparente_BG blanco">
						<div class="col-xs-12">
						  <h1>Mi carrito</h1>
						  @if(count($carrito) > 0)
						  <a href="{{ action('CarritoComprasController@empty_cart') }}" class="btn btn-negro btn-xs pull-right">Vaciar carrito</a>
							@endif
						</div>
						<div class="col-xs-12">
							<table class="table">
								<thead>
									<tr>
										<th></th>
										<th>Nombre</th>
										<th>Descripci&oacute;n</th>
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
													<a href="{{ action('CarritoComprasController@destroy', $producto->id) }}"  data-method="delete" data-confirm="¿Estas seguro que desea eliminar el producto '{{$producto->name}}' del carrito de compras?"> <span title="Eliminar del carrito" data-toggle="tooltip" data-placement="top" class="glyphicon glyphicon-remove blanco"></span></a>
												</td>
												<td>{{$producto->name}}</td>
												<td>{{$producto->options['descripcion']}}</td>
												<td class="text-center">
													{!! Form::model($producto, array('action' => $producto->options['accion'], 'method' => 'POST')) !!}
														<div class="form-group">
															{{ Form::hidden('objeto_id', $producto->id, array('id' => 'objeto_id')) }}
															{{ Form::hidden('metodo', '', array('id' => 'metodo_'.$producto->id)) }}
															{{ Form::button('-', array('class'=>'btn btn-negro btn-xs boton_restar', 'type'=>'button', 'data-id'=>$producto->id)) }} <span id="span_cantidad_{{$producto->id}}">{{$producto->qty}}</span> {{ Form::button('+', array('class'=>'btn btn-negro btn-xs boton_sumar', 'type'=>'button', 'data-id'=>$producto->id)) }}
														</div>
													{!! Form::close() !!}
												</td>
												<td class="text-center">${{$producto->price}}</td>
												<td class="text-center" id="td_subtotal_{{$producto->id}}">${{$producto->subtotal}}</td>
											</tr>
										@endforeach
										<hr>
										<tr class="text-right">
											<td colspan="4"></td>
											<td class="text-center"><strong>TOTAL:</strong></td>
											<td class="text-center" id="td_total"> ${{$total}} </td>
										</tr>
									@else
										<tr class="text-center">
											<td colspan="6">TU CARRITO EST&Aacute; VAC&Iacute;O </td>
										</tr>
									@endif
								</tbody>
							</table>
					</div>
					<div class="col-xs-12">
							@if(count($carrito) > 0)
								<a href="{{ action('CarritoComprasController@send') }}" class="btn btn-rojo pull-right">Realizar pedido</a>
							@endif
					</div>
					<div class="clearfix"></div>
					<br>
				</div>
			</div>
		</div>
	</div>

</section>

@endsection