@extends('aplicacion/app')

@section('content')
<script src="{{ asset('js/sumar_carrito.js') }}"></script>
<section>
	<div class="container">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 transparente_BG blanco">
				<div class="page-header">
				  <h1>Nuestros Productos</h1>
				</div>
				<div class="bloque">

					<?php $first = true; ?>
					<ul class="nav nav-pills nav-justified" role="tablist">
						@foreach($categorias as $categoria)
							@if(count($categoria->productos) > 0)
								<li <?= $first ? 'class="active"' : '' ?>><a id="tab_categoria_<?=$categoria->id?>" href="#categoria_<?=$categoria->id?>" role="tab" data-toggle="tab" class="verde_BA_BG"><h5>{{$categoria}}</h5></a></li>
								<?php $first = false; ?>
							@endif
						@endforeach
					</ul>

					<div class="tab-content">
						<?php $first = true; ?>
						@foreach($categorias as $categoria)
							@if(count($categoria->productos) > 0)
								<div class="tab-pane <?= ($first) ? 'active' : '' ?>" id="categoria_<?=$categoria->id?>">
									<div class="row">
									<div class="col-md-12">
										<div class="panel-group" id="<?= $categoria->id ?>" role="tablist" aria-multiselectable="true">
											@foreach($categoria->productos as $producto)
												<div class="col-xs-6 col-sm-3 caja_bloque text-center">
													<p><img src="{{$producto->get_imagen()}}" class="img-circle" alt="Imagen producto" width="200" height="200"></p>
													<p> {{$producto}} </p>
													<p> <small>{{$producto->descripcion}}</small></p>
													<h4>${{$producto->precio}}</h4>
													<div>
														{!! Form::model($producto, array('action' => ['CarritoComprasController@add_producto'], 'method' => 'POST', 'class' => 'formCarrito')) !!}
															
															<div class="form-group">
																{{ Form::hidden('producto_id', $producto->id, array('id' => 'producto_id')) }}
																{{ Form::hidden('cantidad', 1, array('id' => 'cantidad')) }}
																{{ Form::button('&lt;', array('class'=>'btn btn-negro boton_restar', 'type'=>'button')) }} <span>1</span> {{ Form::button('>', array('class'=>'btn btn-negro boton_sumar', 'type'=>'button')) }}
															</div>

															{{ Form::button('+<span class="glyphicon glyphicon-shopping-cart"></span>',	array('class'=>'btn btn-rojo','type'=>'submit')) }}
														{!! Form::close() !!}
													</div>
												</div>
											@endforeach
										</div>										
										<?php $first = false; ?>
									</div>
									</div>
								</div>
							@endif
						@endforeach
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection