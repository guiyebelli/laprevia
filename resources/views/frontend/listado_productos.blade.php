<div class="productos">
	<div class="row placeholders">
	@foreach($productos as $producto)
		<div class="col-xs-6 col-sm-3 placeholder blanco">
			<p><img src="{{$producto->get_imagen()}}" class="img-circle" alt="Imagen producto" width="200" height="200"></p>
			<p> {{$producto}} </p>
			<h4>${{$producto->precio}}</h4>
			<div>
				{!! Form::model($producto, array('action' => ['CarritoComprasController@add', $producto->id], 'method' => 'POST')) !!}
					{!! Form::submit('Agregar al carrito', array('class' => 'btn btn-primary col-md-12')) !!}
				{!! Form::close() !!}
			</div>
		</div>
	@endforeach
	</div>
</div>
<div class="clearfix"></div>