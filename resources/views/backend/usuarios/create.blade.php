@extends('aplicacion/app')

@section('content')
<div class="container">
	<div class="row transparente_BG blanco">
		<div class="col-xs-8 col-xs-offset-2">
			<div class="text-center">
				<h3><span>NUEVO USUARIO</span></h3>
			</div>
			<div>
				@include('backend.usuarios.form_usuario',['metodo' => 'POST',
												  'titulo' => 'Nuevo Usuario',
												  'accion' => ['UsuariosController@store'],
												  'boton' => 'Crear',
												  'cancelar' => action('UsuariosController@index'),
				])
			</div>
		</div>
	</div>
</div>
@endsection