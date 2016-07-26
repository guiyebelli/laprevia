<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="{{url('images/pagina/favico.png')}}"/>
	
	<title>LA PREVIA DELIVERY</title>

	@include('aplicacion.fronts')
	
</head>

<body id="fondo">
	@include('aplicacion.menu')

	@include('aplicacion.flash')

	@include('aplicacion.modal')

	@if(Request::route()->getPrefix() != '/administracion')
	<div class="fijo">
		<img src="{{url('images/pagina/pedidos-03.png')}}" style="max-width:150px;">
	</div>
	@endif

    @yield('content')

	@include('aplicacion.scripts')

	@include('aplicacion.footer')

</body>

</html>