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
		<div class="form-group">
			{!! Form::label('Imagen actual', 'Imagen actual', array('class' => 'control-label')) !!}
			<img src="{{$producto->get_imagen()}}" class="img-thumbnail" alt="Imagen producto">
		</div>
	@endif

	<div class="form-group @if ($errors->first('imagen')){!! 'has-error' !!}@endif">
		{!! Form::label('imagen', 'Imagen', array('class' => 'control-label')) !!}
		{!! Form::file('imagen', null, array('class' => 'form-control')) !!}
		@if ($errors->first('imagen'))<span class="help-block">{{$errors->first('imagen')}}</span>@endif
	</div>

	{!! Form::submit($boton, array('class' => 'btn btn-primary col-md-12')) !!}
	@if(isset($cancelar))
		<a href="{{ $cancelar }}" class="btn btn-default col-md-12">CANCELAR</a>
	@endif
	<div class="clearfix"></div>

{!! Form::close() !!}