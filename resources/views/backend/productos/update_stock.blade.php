<div>
	{!! Form::model($producto, array('action' => $accion, 'method' => $metodo)) !!}

		<div class="form-group @if ($errors->first('stock')){!! 'has-error' !!}@endif">
			{!! Form::label('stock', 'Stock', array('class' => 'control-label')) !!}
			{!! Form::text('stock', null, array('class' => 'form-control')) !!}
			@if ($errors->first('stock'))<span class="help-block">{{$errors->first('stock')}}</span>@endif
		</div>

		<div class="separar pull-right">
			{!! Form::submit($boton, array('class' => 'btn btn-rojo')) !!}
			@if(isset($cancelar))
				<a href="{{ $cancelar }}" class="btn btn-default">Cancelar</a>
			@endif
		</div>

	{!! Form::close() !!}
</div>