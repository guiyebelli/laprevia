@extends('aplicacion/app')

@section('content')

<div class="container">
	<div class="row transparente_BG blanco">

		<div class="col-xs-12 text-center" >
			<h3><span>CATEGORIAS PRODUCTOS</span></h3>
			<a title="Nuevo" href="{{ action('CategoriasController@create') }}" class="btn btn-rojo pull-right"> Nuevo</a>
		</div>

		<div class="col-xs-12">
			<table class="table">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Imagen</th>
						<th class="text-right">Acciones</th>
					</tr>
				</thead>

				<tbody>
					@if(count($categorias) > 0)
						@foreach($categorias as $categoria)
							<tr>
								<td>{{$categoria->nombre}}</td>
								<td class="col-xs-1"> 
									<img src="{{$categoria->get_imagen()}}" class="img-thumbnail" alt="Imagen categoria">
								</td>
								<td class="text-right">
									<a href="{{ action('CategoriasController@edit', [$categoria->id]) }}"><span data-toggle="tooltip" data-placement="top" data-title="Editar" class="glyphicon glyphicon-pencil blanco"></span></a>
								</td>
							</tr>
						@endforeach
					@else
						<tr class="text-center">
							<td colspan="3">NO EXISTEN CATEGORIAS EN EL SISTEMA</td>
						</tr>
					@endif
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection