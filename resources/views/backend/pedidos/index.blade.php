@extends('aplicacion/app')

@section('content')
<script src="{{ asset('js/cambiar_estado_pedido.js') }}"></script>
<div class="container">
	<div class="row transparente_BG blanco">

		<div class="col-xs-12 text-center" >
			<h3><span>PEDIDOS</span></h3>
		</div>

		<div class="col-xs-12">
			<ul class="nav nav-pills nav-justified" role="tablist">
				<li class="active"><a id="tab_pendientes" href="#pendientes" role="tab" data-toggle="tab" ><h5>PENDIENTES</h5></a></li>
				<li><a id="tab_aceptados" href="#aceptados" role="tab" data-toggle="tab" ><h5>ACEPTADOS</h5></a></li>
				<li><a id="tab_cancelados" href="#cancelados" role="tab" data-toggle="tab" ><h5>CANCELADOS</h5></a></li>
			</ul>

			<div class="tab-content">
				<div class="tab-pane active" id="pendientes">
					@include('backend.pedidos.solapas.pendientes', ['pendientes' => $pendientes])
				</div>

				<div class="tab-pane" id="aceptados">
					@include('backend.pedidos.solapas.aceptados', ['aceptados' => $aceptados])
				</div>

				<div class="tab-pane" id="cancelados">
					@include('backend.pedidos.solapas.cancelados', ['cancelados' => $cancelados])
				</div>
			</div>
		</div>
	</div>
</div>
@endsection