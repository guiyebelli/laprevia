@extends('aplicacion/app')

@section('content')
	
<div class="container">
	<div class="row">
		<div class="col-xs-6 col-xs-offset-6 separador_vert">
			<div id="nuevo_usuario">
				<div class="bandita_color gris_9"></div>
				<div class="banda_gris_header" >
					<h3 class="titulo_banda_gris">
						<span id="titulo_nuevo_usuario" class="gris_3">PERFIL DE USUARIO</span>
					</h3>
				</div>
			</div>
			<div class="banda_gris scroller" data-banda="nuevo_usuario">
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