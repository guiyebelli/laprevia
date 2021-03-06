<div id="carousel-promociones" class="carousel slide col-xs-12" data-ride="carousel">
			  	
  	<!-- Indicators -->
  	<ol class="carousel-indicators">
	  	<?php $count = 0 ?>
		@foreach($promociones as $promocion)
			<li data-target="#carousel-promociones" data-slide-to="{{$count}}" class="{{ ($count == 0) ? 'active' : '' }}"></li>
	    	<?php $count++ ?>
	    @endforeach
  	</ol>

  	<!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
  		<?php $count = 0 ?>
		@foreach($promociones as $promocion)
		    <div class="item {{ ($count == 0) ? 'active' : '' }}">
		    	<div align="center">
		      	<img height='340' src="{{$promocion->get_imagen()}}" alt="Imagen promocion">
		    	</div>
		    </div>
	    	<?php $count++ ?>
	    @endforeach
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-promociones" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="right carousel-control" href="#carousel-promociones" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Siguiente</span>
  </a>
</div>