<div>
	<!-- HEADER -->
	<div><a href="http://lapreviaconcordia.com" data-toggle="tooltip" data-placement="bottom" title="Inicio"><img src="http://lapreviaconcordia.com/images/pagina/laprevia_email.png"></a></div>
	<br>
	<br>
	<!-- FIN HEADER -->

	<p style="color: #EA1D25; font-size: 2em;"> Pedido generado a trav&eacute;s de La Previa Delivery. </p>
	<p id="titulo" style="color: #EA1D25; font-size: 1.3em;"><strong>Su pedido es el siguiente:</strong></p>
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

	
	<p style="color: #666; font-size: 1.0em;"><strong>El administrador del sistema le confirmar&aacute; a la brevedad si su pedido fue o no aceptado.</strong></p>
	<p style="color: #666; font-size: 1.0em;"><strong>En el caso de ser aceptado, se le informar&aacute; el tiempo de demora.</strong></p>
	<br>
	<p style="color: #666; font-size: 1.0em;">Muchas gracias.</p>
	<p style="color: #666; font-size: 1.0em;">La Previa Delivery.</p>

	<!-- FOOTER -->
	<br>
	<br>
	<div id="linea" style="border-top: 1px solid #adadad; padding-top: 20px;">
		<p id="chico" style="color: #999; text-align: center; font-size: 0.8em;">
			<a href="https://www.facebook.com/lapreviacdia/" target="_blanck"><img src="{{url('images/pagina/facebook.png')}}"></a>
			<a href="https://www.instagram.com/lapreviacdia/" target="_blanck"><img src="{{url('images/pagina/instagram.png')}}"></a>
			<a href="https://twitter.com/lapreviacdia" target="_blanck"><img src="{{url('images/pagina/twitter.png')}}"></a>
		</p> 
		<p id="chico" style="color: #999; text-align: center; font-size: 0.8em;">Concordia - Entre Ríos | (0345) 154134437 │ <a href="" id="email" style="color: #999; text-align: center; font-size: 1em;">lapreviacdia@gmail.com</a></p> 
		<p id="chico" style="color: #999; text-align: center; font-size: 0.8em;">Este email se ha generado autom&aacute;ticamente. Por favor, no contest&eacute;s a este email.</p> 
	</div>
	<!-- FIN FOOTER -->
</div>