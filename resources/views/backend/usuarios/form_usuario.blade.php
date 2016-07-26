{!! Form::model($usuario, array('action' => $accion, 'method' => $metodo)) !!}

	<div class="form-group @if ($errors->first('nombre')){!! 'has-error' !!}@endif">
		{!! Form::label('nombre', 'Nombre', array('class' => 'control-label')) !!}
		{!! Form::text('nombre', null, array('class' => 'form-control')) !!}
		@if ($errors->first('nombre'))<span class="help-block">{{$errors->first('nombre')}}</span>@endif
	</div>

	<div class="form-group @if ($errors->first('apellido')){!! 'has-error' !!}@endif">
		{!! Form::label('apellido', 'Apellido', array('class' => 'control-label')) !!}
		{!! Form::text('apellido', null, array('class' => 'form-control')) !!}
		@if ($errors->first('apellido'))<span class="help-block">{{$errors->first('apellido')}}</span>@endif
	</div>

	<div class="form-group @if ($errors->first('email')){!! 'has-error' !!}@endif">
		{!! Form::label('email', 'E-mail', array('class' => 'control-label')) !!}
		{!! Form::text('email',null, array('class' => 'form-control')) !!}
		@if ($errors->first('email'))<span class="help-block">{{$errors->first('email')}}</span>@endif
	</div>

	@if ($metodo == 'POST')
		<div class="form-group @if ($errors->first('username')){!! 'has-error' !!}@endif">
			{!! Form::label('username', 'Usuario', array('class' => 'control-label')) !!}
			{!! Form::text('username',null, array('class' => 'form-control')) !!}
			@if ($errors->first('username'))<span class="help-block">{{$errors->first('username')}}</span>@endif
		</div>
	@endif

	<div class="separar pull-right">
		{!! Form::submit($boton, array('class' => 'btn btn-rojo')) !!}
		@if(isset($cancelar))
			<a href="{{ $cancelar }}" class="btn btn-default">Cancelar</a>
		@endif
	</div>

{!! Form::close() !!}
				
