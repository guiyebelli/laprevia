<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>LA PREVIA DELIVERY</title>

	@include('aplicacion.fronts')
	
</head>

<body id="fondo">
	@include('aplicacion.menu')

	@include('aplicacion.flash')

	@include('aplicacion.modal')

    @yield('content')

	@include('aplicacion.scripts')

	@include('aplicacion.footer')

</body>

</html>