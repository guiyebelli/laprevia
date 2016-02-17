@if (Session::has('noticia'))
	<div class="alert alert-success fade in">
	    <button class="close" data-dismiss="alert" aria-hidden="true">×</button>
	    <span class="glyphicon glyphicon-ok-sign"></span> {{ Session::get('noticia') }}
	</div>
@endif	
@if (Session::has('error'))
	<div class="alert alert-danger fade in">
	    <button class="close" data-dismiss="alert" aria-hidden="true">×</button>
	    <span class="glyphicon glyphicon-remove-sign"></span> {{ Session::get('error') }}
	</div>
@endif	
@if (Session::has('advertencia'))
	<div class="alert alert-warning fade in">
	    <button class="close" data-dismiss="alert" aria-hidden="true">×</button>
	    <span class="glyphicon glyphicon-exclamation-sign"></span> {{ Session::get('advertencia') }}
	</div>
@endif
@if (session('status'))
	<div class="alert alert-success fade in">
	    <button class="close" data-dismiss="alert" aria-hidden="true">×</button>
	    <span class="glyphicon glyphicon-ok-sign"></span> {{ session('status') }}
	</div>
@endif