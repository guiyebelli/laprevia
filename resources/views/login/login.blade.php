@extends('aplicacion/app')

@section('content')

<div class="container">
	<div class="row">

		<div class="col-md-6 col-md-offset-6 separador_vert transparente_BG blanco">
			<div id="login">
				<div class="bandita_color gris_9"></div>
				<div class="banda_gris_header">
					<h3 class="titulo_banda_gris">
						<span id="titulo_indicadores_graficos" class="gris_3">INICIAR SESIÓN</span>
					</h3>
				</div>
			</div>

			<div class="banda_gris">
				@if (Session::has('authenticate'))
					<div class="alert alert-danger fade in">
					    <button class="close" data-dismiss="alert" aria-hidden="true">×</button>
					    <span class="glyphicon glyphicon-remove-sign"></span> {{ Session::get('authenticate') }}
					</div>
				@endif
				<h4>Esta sección está destinada a la administración del sitio.</h4>

			{!! Form::open( array( 'action' => 'LoginController@authenticate', 'method' => 'POST' ) ) !!}
				<div class="col-md-12">
					<div class="form-group @if ($errors->first('username')){!! 'has-error' !!}@endif">
						{!! Form::label('username', 'Usuario', array('class' => 'control-label') ) !!}
						{!! Form::text('username', null, array('class' => 'form-control')) !!}
						@if ($errors->first('username'))<span class="help-block">{{$errors->first('username')}}</span>@endif
					</div>

					<div class="form-group @if ($errors->first('password')){!! 'has-error' !!}@endif">
						{!! Form::label('password', 'Contraseña', array('class' => 'control-label')) !!}
						{!! Form::password('password', array('class' => 'form-control')) !!}
						@if ($errors->first('password'))<span class="help-block">{{$errors->first('password')}}</span>@endif
					</div>

					{!! Form::submit('Iniciar sesion', array('class' => 'btn btn-block btn-rojo')) !!}
					<a href="{{url('password/email')}}" class="btn btn-default btn-block">¿Olvidó su contraseña?</a>
					<br>

				</div>
				{!! Form::close() !!}
				
			</div>
		</div>
	</div>
</div>
@endsection