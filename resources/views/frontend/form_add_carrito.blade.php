<div class="text-center">
{!! Form::model($objeto, array('action' => [$accion], 'method' => 'POST', 'class' => 'formCarrito')) !!}
											
	<div class="form-group">
		{{ Form::hidden('objeto_id', $objeto->id, array('id' => 'objeto_id')) }}
		{{ Form::hidden('cantidad', 1, array('id' => 'cantidad_'.$objeto->id)) }}
		{{ Form::button('&lt;', array('class'=>'btn btn-negro btn-xs boton_restar', 'type'=>'button', 'data-id'=>$objeto->id)) }} <span>1</span> {{ Form::button('>', array('class'=>'btn btn-negro btn-xs boton_sumar', 'type'=>'button', 'data-id'=>$objeto->id)) }}
	</div>

	{{ Form::button('+<span class="glyphicon glyphicon-shopping-cart"></span>',	array('class'=>'btn btn-rojo','type'=>'submit')) }}
{!! Form::close() !!}
</div>