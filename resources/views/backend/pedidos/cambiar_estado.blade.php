<div>
	{!! Form::model($pedido, array('action' => $accion, 'method' => $metodo, 'id' => 'formCambioEstado')) !!}

		{{ Form::hidden('estado', $pedido->estado, array('id' => 'estado')) }}
    
    <!-- ACEPTAR -->
    <div class="col-xs-6">
      <center>
        <div class="btn-group">
          <a id="submit_1" href="#" data-estado="1" class="btn btn-default btn-circle btn-lg"><span class="glyphicon glyphicon-ok-sign verde" aria-hidden="true"></span></a>
        </div>
        <p>Aceptar</p>
      </center>
    </div>

    <!-- CANCELAR -->
    <div class="col-xs-6">
      <center>
        <div class="btn-group">
          <a id="submit_2" href="#" data-estado="2" class="btn btn-default btn-circle btn-lg"><span class="glyphicon glyphicon-remove-sign rojo" aria-hidden="true"></span></a>
        </div>
        <p>Cancelar</p>
      </center>
    </div>

    <div class="checkbox">
      <label class="checkbox-inline">
      	{{ Form::checkbox('notificacion', null, true, ['id' => 'notificacion']) }}
      	Notificar al comprador v&iacute;a e-mail<br>
      </label>
    </div>

    <div class="clearfix"></div>

	{!! Form::close() !!}
</div>