<table class="table">
	<thead>
		<tr>
			<th></th>
			<th>Comprador</th>
			<th>Telefono</th>
			<th>Direccion</th>
			<th>E-mail</th>
			<th>Comentario</th>
			<th>Va a pagar con</th>
			<th>Total</th>
		</tr>
	</thead>

	<tbody>
		@if(count($aceptados) > 0)
			@foreach($aceptados as $pedido)
				<tr>
					<td class="text-center">
						<a class="modal-view" href="{{ action('PedidosController@cambiar_estado', [$pedido->id]) }}"><span class="glyphicon glyphicon-ok-sign verde" data-toggle="tooltip" data-placement="top" data-title="Pedido aceptado"></span></a>
					</td>
					<td>{{$pedido->comprador}}</td>
					<td>{{$pedido->telefono}}</td>
					<td>{{$pedido->direccion}}</td>
					<td>{{$pedido->email}}</td>
					<td>{{$pedido->comentario}}</td>
					<td>{{$pedido->monto}}</td>
					<td>{{$pedido->total}}</td>
				</tr>
			@endforeach
		@else
			<tr class="text-center">
				<td colspan="8">NO EXISTEN PEDIDOS ACEPTADOS EN EL SISTEMA</td>
			</tr>
		@endif
	</tbody>
</table>