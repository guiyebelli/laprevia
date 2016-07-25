@extends('aplicacion/app')

@section('content')

<section>
	<div class="container">
		<div class="row">
			@if(count($promociones) > 0)
				@include('frontend.carousel_promociones')
			@endif

			<div class="col-xs-10 col-xs-offset-1 bloque">
				@if(count($productos) > 0)
					@include('frontend.listado_productos')
				@endif
			</div>

		</div>
	</div>

</section>

@endsection