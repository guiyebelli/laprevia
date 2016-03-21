{!! Form::model($producto, array('action' => $accion, 'method' => $metodo, 'enctype' => 'multipart/form-data')) !!}

	<div class="form-group @if ($errors->first('nombre')){!! 'has-error' !!}@endif">
		{!! Form::label('nombre', 'Nombre', array('class' => 'control-label')) !!}
		{!! Form::text('nombre', null, array('class' => 'form-control')) !!}
		@if ($errors->first('nombre'))<span class="help-block">{{$errors->first('nombre')}}</span>@endif
	</div>

	<div class="form-group @if ($errors->first('precio')){!! 'has-error' !!}@endif">
		{!! Form::label('precio', 'Precio', array('class' => 'control-label')) !!}
		{!! Form::text('precio', null, array('class' => 'form-control')) !!}
		@if ($errors->first('precio'))<span class="help-block">{{$errors->first('precio')}}</span>@endif
	</div>

	<div class="form-group @if ($errors->first('descripcion')){!! 'has-error' !!}@endif">
		{!! Form::label('descripcion', 'Descripción', array('class' => 'control-label')) !!}
		{!! Form::text('descripcion', null, array('class' => 'form-control')) !!}
		@if ($errors->first('descripcion'))<span class="help-block">{{$errors->first('descripcion')}}</span>@endif
	</div>


	@if ($producto->imagen)
		<div>
			<img src="">
		</div>
	@endif

	{!! Form::submit($boton, array('class' => 'btn btn-primary col-md-12')) !!}
	@if(isset($cancelar))
		<a href="{{ $cancelar }}" class="btn btn-default col-md-12">CANCELAR</a>
	@endif
	<div class="clearfix"></div>

{!! Form::close() !!}