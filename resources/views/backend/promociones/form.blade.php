<div class="container">
	<div class="row">
		<div class="col-xs-8 col-xs-offset-2 transparente_BG blanco">
			<div class="text-center">
				<h3><span>{{$titulo}}</span></h3>
			</div>

			<div>
				{!! Form::model($promocion, array('action' => $accion, 'method' => $metodo, 'enctype' => 'multipart/form-data')) !!}

					<div class="form-group @if ($errors->first('visible')){!! 'has-error' !!}@endif">
						{!! Form::label('visible', '¿Queres que se vea en el inicio?', array('class' => 'control-label')) !!}
						{!! Form::select('visible', array('0' => 'Si', '1' => 'No'), null, array('class' => 'form-control', 'id' => 'visible')) !!}
						@if ($errors->first('visible'))<span class="help-block">{{$errors->first('visible')}}</span>@endif
					</div>

					<div class="form-group @if ($errors->first('nombre')){!! 'has-error' !!}@endif">
						{!! Form::label('nombre', 'Nombre', array('class' => 'control-label')) !!}
						{!! Form::text('nombre', null, array('class' => 'form-control')) !!}
						@if ($errors->first('nombre'))<span class="help-block">{{$errors->first('nombre')}}</span>@endif
					</div>

					<div class="form-group @if ($errors->first('precio')){!! 'has-error' !!}@endif">
						{!! Form::label('precio', 'Precio', array('class' => 'control-label')) !!}
						{!! Form::text('precio', null, array('class' => 'form-control')) !!}
						@if ($errors->first('precio'))<span class="help-block">{{$errors->first('precio')}}</span>@endif
					</div>

					<div class="form-group @if ($errors->first('precio_original')){!! 'has-error' !!}@endif">
						{!! Form::label('precio_original', 'Precio Original', array('class' => 'control-label')) !!}
						{!! Form::text('precio_original', null, array('class' => 'form-control')) !!}
						@if ($errors->first('precio_original'))<span class="help-block">{{$errors->first('precio_original')}}</span>@endif
					</div>

					<div class="form-group @if ($errors->first('descripcion')){!! 'has-error' !!}@endif">
						{!! Form::label('descripcion', 'Descripci&oacute;n', array('class' => 'control-label')) !!}
						{!! Form::text('descripcion', null, array('class' => 'form-control')) !!}
						@if ($errors->first('descripcion'))<span class="help-block">{{$errors->first('descripcion')}}</span>@endif
					</div>


					@if ($promocion->imagen)
						<div class="form-group">
							{!! Form::label('imagen_actual', 'Imagen actual', array('class' => 'control-label')) !!}
							<div class="col-xs-12">
								<div class="col-xs-3">
									<img src="{{$promocion->get_imagen()}}" class="img-thumbnail" alt="Imagen promocion">
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
	</div>
</div>
<div class="clearfix"></div>