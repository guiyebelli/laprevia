@foreach($productos as $producto)
	<div class="col-xs-4 blanco">
		<div>
			{!! Form::model($producto, array('action' => ['CarritoComprasController@add', $producto->id], 'method' => 'POST')) !!}
				{!! Form::submit('<span class="glyphicon glyphicon-plus"></span>', array('class' => 'btn btn-primary col-md-12')) !!}
			{!! Form::close() !!}
		</div>
		<p> {{$producto}} </p>
		<p><img src="{{$producto->get_imagen()}}" class="img-thumbnail" alt="Imagen producto"></p>
		<p class="text-left">{{$producto->descripcion}}</p>
		<p class="text-right">${{$producto->precio}}</p>
	</div>
@endforeach
<div class="clearfix"></div>