@extends('aplicacion/app')

@section('content')
<div class="container">
	<div class="row transparente_BG blanco">
		<div class="col-xs-8 col-xs-offset-2">
			<div class="text-center">
				<h3><span>EDICI&Oacute;N USUARIO</span></h3>
			</div>
			<div>
				@include('backend.usuarios.form_usuario',['metodo' => 'PATCH',
												  'accion' => ['UsuariosController@update', $usuario->id],
												  'boton' => 'Guardar',
												  'cancelar' => action('UsuariosController@index'),
				])
			</div>
		</div>
	</div>
</div>
@endsection