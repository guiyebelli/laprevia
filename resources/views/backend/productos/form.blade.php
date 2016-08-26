<div class="container">
	<div class="row">
		<div class="col-xs-8 col-xs-offset-2 transparente_BG blanco">
			<div class="text-center">
				<h3 class="titulo_banda_gris">
					<span>{{$titulo}}</span>
				</h3>
			</div>

			<div>
				{!! Form::model($producto, array('action' => $accion, 'method' => $metodo, 'enctype' => 'multipart/form-data')) !!}

					<div class="form-group @if ($errors->first('categoria_id')){!! 'has-error' !!}@endif">
						{!! Form::label('categoria_id', 'Categor&iacute;a', array('class' => 'control-label')) !!}
						{!! Form::select('categoria_id', $categorias, null, array('class' => 'form-control', 'id' => 'categoria_id')) !!}
						@if ($errors->first('categoria_id'))<span class="help-block">{{$errors->first('categoria_id')}}</span>@endif
					</div>

					<div class="form-group @if ($errors->first('nombre')){!! 'has-error' !!}@endif">
						{!! Form::label('nombre', 'Nombre', array('class' => 'control-label')) !!}
						{!! Form::text('nombre', null, array('class' => 'form-control')) !!}
						@if ($errors->first('nombre'))<span class="help-block">{{$errors->first('nombre')}}</span>@endif
					</div>

					<div class="form-group @if ($errors->first('descripcion')){!! 'has-error' !!}@endif">
						{!! Form::label('descripcion', 'Descripci&oacute;n', array('class' => 'control-label')) !!}
						{!! Form::text('descripcion', null, array('class' => 'form-control')) !!}
						@if ($errors->first('descripcion'))<span class="help-block">{{$errors->first('descripcion')}}</span>@endif
					</div>

					<div class="form-group @if ($errors->first('precio')){!! 'has-error' !!}@endif">
						{!! Form::label('precio', 'Precio', array('class' => 'control-label')) !!}
						<div class="input-group">
      				<div class="input-group-addon">$</div>
							{!! Form::text('precio', null, array('class' => 'form-control')) !!}
						</div>
						@if ($errors->first('precio'))<span class="help-block">{{$errors->first('precio')}}</span>@endif
					</div>

					<div class="form-group @if ($errors->first('stock')){!! 'has-error' !!}@endif">
						{!! Form::label('stock', 'Stock', array('class' => 'control-label')) !!}
						{!! Form::text('stock', null, array('class' => 'form-control')) !!}
						@if ($errors->first('stock'))<span class="help-block">{{$errors->first('stock')}}</span>@endif
					</div>

					@if ($producto->imagen)
						<div class="form-group">
							{!! Form::label('Imagen actual', 'Imagen actual', array('class' => 'control-label')) !!}
							<div class="col-xs-12">
								<div class="col-xs-3">
									<img src="{{$producto->get_imagen()}}" class="img-thumbnail" alt="Imagen producto">
								</div>
							</div>
						</div>
					@endif

					<div class="form-group @if ($errors->first('imagen')){!! 'has-error' !!}@endif">
						{!! Form::label('imagen', 'Imagen', array('class' => 'control-label')) !!}
						{!! Form::file('imagen', null, array('class' => 'form-control')) !!}
						@if ($errors->first('imagen'))<span class="help-block">{{$errors->first('imagen')}}</span>@endif
					</div>

					<div class="separar pull-right">
						{!! Form::submit($boton, array('class' => 'btn btn-rojo')) !!}
						@if(isset($cancelar))
							<a href="{{ $cancelar }}" class="btn btn-default">Cancelar</a>
						@endif
					</div>

				{!! Form::close() !!}
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
