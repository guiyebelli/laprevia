<!-- E S T I L O S -->
<link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel='stylesheet' type='text/css'>
<link href="{{ asset('css/jquery-confirm.css') }}" rel='stylesheet' type='text/css'>
<link href="{{ asset('css/estilos.css') }}" rel="stylesheet">

<!-- JQUERY -->
<script src="{{ asset('js/jquery-2.2.0.min.js') }}"></script>
<!-- BOOTSTRAP -->
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

<script>
	window.csrfToken = '<?php echo csrf_token(); ?>';
</script>