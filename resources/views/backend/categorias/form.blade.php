<div class="container">
	<div class="row">
		<div class="col-xs-8 col-xs-offset-2 transparente_BG blanco">
			<div class="text-center">
				<h3 class="titulo_banda_gris">
					<span>{{$titulo}}</span>
				</h3>
			</div>

			<div>
				{!! Form::model($categoria, array('action' => $accion, 'method' => $metodo, 'enctype' => 'multipart/form-data')) !!}

					<div class="form-group @if ($errors->first('nombre')){!! 'has-error' !!}@endif">
						{!! Form::label('nombre', 'Nombre', array('class' => 'control-label')) !!}
						{!! Form::text('nombre', null, array('class' => 'form-control')) !!}
						@if ($errors->first('nombre'))<span class="help-block">{{$errors->first('nombre')}}</span>@endif
					</div>

					@if ($categoria->imagen)
						<div class="form-group">
							{!! Form::label('Imagen actual', 'Imagen actual', array('class' => 'control-label')) !!}
							<div class="col-xs-12">
								<div class="col-xs-3">
									<img src="{{$categoria->get_imagen()}}" class="img-thumbnail" alt="Imagen categoria">
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