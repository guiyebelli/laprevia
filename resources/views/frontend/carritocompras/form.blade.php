@extends('aplicacion/app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-xs-8 col-xs-offset-2 transparente_BG blanco">
			<div class="text-center">
				<h3 class="titulo_banda_gris">
					<span>{{$titulo}}</span>
				</h3>
			</div>

			<div>
				@if(count($carrito) > 0)
					@foreach($carrito as $producto)
						<p>{{$producto->qty}} x ${{$producto->price}}  = ${{$producto->subtotal}} - {{$producto->name}} ({{$producto->options['descripcion']}}) </p>
					@endforeach
				@endif
				<p>Total a pagar: ${{$total}}</p>


				{!! Form::model($pedido, array('action' => $accion, 'method' => $metodo)) !!}

					<div class="form-group @if ($errors->first('comprador')){!! 'has-error' !!}@endif">
						{!! Form::label('comprador', '*Nombre y apellido', array('class' => 'control-label')) !!}
						{!! Form::text('comprador', null, array('class' => 'form-control')) !!}
						@if ($errors->first('comprador'))<span class="help-block">{{$errors->first('comprador')}}</span>@endif
					</div>

					<div class="form-group @if ($errors->first('telefono')){!! 'has-error' !!}@endif">
						{!! Form::label('telefono', '*Tel&eacute;fono', array('class' => 'control-label')) !!}
						{!! Form::text('telefono', null, array('class' => 'form-control')) !!}
						@if ($errors->first('telefono'))<span class="help-block">{{$errors->first('telefono')}}</span>@endif
					</div>

					<div class="form-group @if ($errors->first('email')){!! 'has-error' !!}@endif">
						{!! Form::label('email', '*E-mail', array('class' => 'control-label')) !!}
						{!! Form::text('email', null, array('class' => 'form-control')) !!}
						@if ($errors->first('email'))<span class="help-block">{{$errors->first('email')}}</span>@endif
						<span id="helpBlock" class="help-block"><h6>Al ingresar tu e-mail recibiras una notificaci&oacute;n del pedido agendado, como tambien si el mismo es confirmado.</h6></span>
					</div>

					<div class="form-group @if ($errors->first('direccion')){!! 'has-error' !!}@endif">
						{!! Form::label('direccion', '*Direcci&oacute;n', array('class' => 'control-label')) !!}
						{!! Form::text('direccion', null, array('class' => 'form-control')) !!}
						@if ($errors->first('direccion'))<span class="help-block">{{$errors->first('direccion')}}</span>@endif
					</div>

					<div class="form-group @if ($errors->first('monto')){!! 'has-error' !!}@endif">
						{!! Form::label('monto', '*Con cu&aacute;nto va a pagar?', array('class' => 'control-label')) !!}
						{!! Form::text('monto', null, array('class' => 'form-control')) !!}
						@if ($errors->first('monto'))<span class="help-block">{{$errors->first('monto')}}</span>@endif
					</div>

					<div class="form-group">
						{!! Form::label('comentario', 'Comentario para el vendedor', array('class' => 'control-label')) !!}
						{!! Form::textarea('comentario', null, ['class' => 'form-control']) !!}
					</div>

					<div class="form-group">
						<strong><p class="verde_BA">Campos obligatorios (*)</p></strong>
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
@endsection