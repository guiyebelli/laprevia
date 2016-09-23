<div>
	<!-- HEADER -->
	<div><a href="http://lapreviaconcordia.com" data-toggle="tooltip" data-placement="bottom" title="Inicio"><img src="http://lapreviaconcordia.com/images/pagina/laprevia_email.png"></a></div>
	<br>
	<br>
	<!-- FIN HEADER -->

	<p style="color: #EA1D25; font-size: 2em;"> Nuevo pedido generado a trav&eacute;s de La Previa Delivery. </p>
	<p id="titulo" style="color: #EA1D25; font-size: 1.3em;"><strong>El pedido es el siguiente:</strong></p>
	<br>

	<table style="color: #666; border-color: #666; margin-bottom: 20px; max-width: 100%; width: 100%;">
		<thead>
			<tr>
				<th style="text-align:left;">Nombre</th>
				<th style="text-align:left;">Descripci&oacute;n</th>
				<th style="text-align:center;">Cantidad</th>
				<th style="text-align:center;">Precio</th>
				<th style="text-align:right;">SubTotal</th>
			</tr>
		</thead>

		<tbody>
			@foreach($carrito as $producto)
				<tr>
					<td style="text-align:left;">{{$producto->name}}</td>
					<td style="text-align:left;">{{$producto->options['descripcion']}}</td>
					<td style="text-align:center;">{{$producto->qty}}</td>
					<td style="text-align:center;">${{$producto->price}}</td>
					<td style="text-align:right;">${{$producto->subtotal}}</td>
				</tr>
			@endforeach
			<br>
			<tr style="text-align:right; border-top: 1px solid #adadad; padding-top: 20px;">
				<td colspan="3"></td>
				<td style="text-align:right;"><strong>TOTAL:</strong></td>
				<td style="text-align:right;"> ${{$pedido->total}} </td>
			</tr>
		</tbody>
	</table>

	<br>

	<p id="titulo" style="color: #EA1D25; font-size: 1.3em;"><strong>Datos del comprador:</strong></p> 
	<p id="comun" style="color: #666; font-size: 1.0em;"><strong>Nombre:</strong> {{$pedido->comprador}}.</p> 
	<p id="comun" style="color: #666; font-size: 1.0em;"><strong>Tel&eacute;fono:</strong> {{$pedido->telefono}}.</p> 
	<p id="comun" style="color: #666; font-size: 1.0em;"><strong>E-mail:</strong> {{$pedido->email}}.</p> 
	<p id="comun" style="color: #666; font-size: 1.0em;"><strong>Direcci&oacute;n:</strong> {{$pedido->direccion}}.</p> 
	<p id="comun" style="color: #666; font-size: 1.0em;"><strong>Con cu&aacute;nto va a pagar?:</strong> {{$pedido->monto}}.</p> 
	<p id="comun" style="color: #666; font-size: 1.0em;"><strong>Comentario para el vendedor:</strong></p> 
	<p id="comun" style="color: #666; font-size: 1.5em;">{{($pedido->comentario != '') ? $pedido->comentario : 'sin comentario' }}.</p> 

	<!-- FOOTER -->
	<br>
	<br>
	<div id="linea" style="border-top: 1px solid #adadad; padding-top: 20px;">
		<p id="chico" style="color: #999; text-align: center; font-size: 0.8em;">Este email se ha generado automáticamente. Por favor, no contestés a este email.</p> 
		<p id="chico" style="color: #999; text-align: center; font-size: 0.8em;">
			<a href="https://www.facebook.com/lapreviacdia/" target="_blanck"><img src="{{url('images/pagina/facebook.png')}}"></a>
			<a href="https://www.instagram.com/lapreviacdia/" target="_blanck"><img src="{{url('images/pagina/instagram.png')}}"></a>
			<a href="https://twitter.com/lapreviacdia" target="_blanck"><img src="{{url('images/pagina/twitter.png')}}"></a>
		</p> 
		<p id="chico" style="color: #999; text-align: center; font-size: 0.8em;">Concordia - Entre Ríos</p> 
		<p id="chico" style="color: #999; text-align: center; font-size: 0.8em;">Pedidos al (0345) 154134437 │ <a href="" id="email" style="color: #999; text-align: center; font-size: 1em;">lapreviacdia@gmail.com</a></p> 
	</div>
	<!-- FIN FOOTER -->
</div>