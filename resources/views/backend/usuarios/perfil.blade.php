@extends('aplicacion/app')

@section('content')
<div class="container">
	<div class="row transparente_BG blanco">
		<div class="col-md-6">
			<h3><span>MI USUARIO</span></h3>
			@include('backend.usuarios.form_usuario',['metodo' => 'PATCH',
											  'titulo' => 'MI USUARIO',
											  'accion' => ['UsuariosController@update', $usuario->id],
											  'boton' => 'Actualizar',
			])
		</div>

		<div class="col-md-6">
			<h3><span>CAMBIAR MI CONTRASEÑA</span></h3>
			@include('backend.usuarios.form_nueva_contra')
		</div>
	</div>
</div>
@endsection