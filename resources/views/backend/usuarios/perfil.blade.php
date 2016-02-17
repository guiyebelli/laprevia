@extends('aplicacion/app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<h3 class="titulo_banda_gris">
				<span id="titulo_mi_usuario" class="gris_3">MI USUARIO</span>
			</h3>

			@include('backend.usuarios.form_usuario',['metodo' => 'PATCH',
											  'titulo' => 'MI USUARIO',
											  'accion' => ['UsuariosController@update', $usuario->id],
											  'boton' => 'Actualizar',
			])
		</div>

		<div class="col-md-6">
			<h3 class="titulo_banda_gris">
				<span id="titulo_mi_usuario" class="gris_3">CAMBIAR MI CONTRASEÑA</span>
			</h3>

			<div class="banda_gris">		
				@include('backend.usuarios.form_nueva_contra')
			</div>
		</div>
	</div>
</div>
@endsection