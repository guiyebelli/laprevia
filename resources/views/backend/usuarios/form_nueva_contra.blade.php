
{!! Form::open(array('action' => ['UsuariosController@guardar_contra', $usuario->id], 'method' => 'PATCH')) !!}

	<div class="form-group @if ($errors->first('password')){!! 'has-error' !!}@endif">
		{!! Form::label('password', 'Nueva contraseña', array('class' => 'control-label')) !!}
		{!! Form::password('password', array('class' => 'form-control')) !!}
		@if ($errors->first('password'))<span class="help-block">{{$errors->first('password')}}</span>@endif
	</div>

	<div class="form-group @if ($errors->first('password_confirmation')){!! 'has-error' !!}@endif">
		{!! Form::label('password_confirmation', 'Confirmar nueva contraseña', array('class' => 'control-label')) !!}
		{!! Form::password('password_confirmation', array('class' => 'form-control')) !!}
		@if ($errors->first('password_confirmation'))<span class="help-block">{{$errors->first('password_confirmation')}}</span>@endif
	</div>

	<div class="separar pull-right">
		{!! Form::submit('Guardar', array('class' => 'btn btn-rojo btn-block')) !!}
		@if(isset($cancelar))
			<a href="{{ $cancelar }}" class="btn btn-default btn-block">CANCELAR</a>
		@endif
	</div>
{!! Form::close() !!}