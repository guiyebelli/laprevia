@extends('aplicacion/app')

@section('content')

<div class="container">
	<div class="row">

		<div class="text-center" >
			<h3>
				<span>USUARIOS DEL SISTEMA</span>
			</h3>
			<a title="Nuevo usuario" href="{{ action('UsuariosController@create') }}" class="btn btn-primary pull-right"> Nuevo</a>
		</div>


		<div class="banda_gris scroller" data-banda="altura_usuarios">
			<table class="table table-striped">
				<thead>
					<tr>
						<th class="text-center"></th>
						<th class="text-center">Estado</th>
						<th>Nombre de usuario</th>
						<th>Nombre y Apellido</th>
						<th>Email</th>
						<th>Acciones</th>
					</tr>
				</thead>

				<tbody>
				@if(count($usuarios) > 0)
					@foreach($usuarios as $usuario)
						<tr>
							@if ($usuario->estado == 1) 
								 <!-- Activo -->
								<td class="text-center"></td>				    
								<td class="text-center"><a title="Desactivar" href="{{ action('UsuariosController@desactivar', [$usuario->id]) }}" data-method="patch" data-title="Activación de usuario" data-confirm="¿Esta seguro que desea desactivar al usuario '{{$usuario->username}}'?" data-toggle="tooltip" data-placement="top"> <span class="glyphicon glyphicon-ok-sign"></span> </a></td>
							@elseif ($usuario->estado == 0)
							     <!-- Desactivado -->						    
								<td class="text-center"></td>				    
								<td class="text-center"><a title="Activar" href="{{ action('UsuariosController@activar', [$usuario->id]) }}" data-method="patch" data-title="Activación de usuario" data-confirm="¿Esta seguro que desea activar al usuario '{{$usuario->username}}'?" data-toggle="tooltip" data-placement="top"> <span class="glyphicon glyphicon-remove-sign"></span> </a></td>
							@elseif ($usuario->estado == 2)
							    <!-- Pendiente -->
							    <td class="text-center"><span title="Usuario Pendiente" class="glyphicon glyphicon-alert"  data-toggle="tooltip" data-placement="top"></span></td>						    
							    <td class="text-center"><a title="Activar Pendiente" href="{{ action('UsuariosController@activar_pendiente', [$usuario->id]) }}" data-method="patch" data-title="Activación de usuario" data-confirm="¿Esta seguro que desea activar al usuario '{{$usuario->username}}'?" data-toggle="tooltip" data-placement="top"> <span class="glyphicon glyphicon-remove-sign"></span> </a></td>
							@endif
							
							<td>{{$usuario->username}}</td>
							<td>{{$usuario}}</td>
							<td>{{$usuario->email}}</td>
							<td>
								<a title="Restablecer contraseña" data-toggle="tooltip" data-placement="bottom" href="{{ action('UsuariosController@restablecer_contra', [$usuario->id]) }}" data-method="patch" data-title="Restablecer contraseña" data-confirm="¿Esta seguro que desea restablecer la contraseña al usuario '{{$usuario->username}}'?"><span class="glyphicon glyphicon-refresh"></span></a>
								  <!-- dejar esta línea q es un espacio entre los dos iconos -->
								<a title="Editar perfil" data-toggle="tooltip" data-placement="bottom" href="{{ action('UsuariosController@edit', [$usuario->id]) }}"><span class="glyphicon glyphicon-pencil"></span></a>
								  <!-- dejar esta línea q es un espacio entre los dos iconos -->
								<a href="{{ action('UsuariosController@destroy', [$usuario->id]) }}" title="Eliminar" data-toggle="tooltip" data-placement="bottom" data-method="delete" data-confirm="¿Estas seguro que desea eliminar al usuario '{{$usuario->username}}'?"> <span class="glyphicon glyphicon-trash"></span> </a>
							</td>
						</tr>
					@endforeach
				@else
					<tr class="text-center">
						<td colspan="6">NO EXISTEN USUARIOS EN EL SISTEMA</td>
					</tr>
				@endif

				</tbody>
			</table>
			
		</div>
	</div>
</div>

@endsection