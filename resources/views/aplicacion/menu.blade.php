<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="{{url('')}}"><img src="{{url('images/pagina/favico.png')}}" class="img-thumbnail imagen_menu"></a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		    <ul class="nav navbar-nav">
		        <li <?= (\Route::current()->geturi() == 'productos') ? 'class="active"' : '' ?>><a href="{{action('InicioController@productos')}}">Productos <span class="sr-only">(current)</span></a></li>
		        <li <?= (\Route::current()->geturi() == 'promociones') ? 'class="active"' : '' ?>><a href="{{action('InicioController@promociones')}}">Promociones</a></li>
		    </ul>

      	<ul class="nav navbar-nav navbar-right">
      		<li <?= (\Route::current()->geturi() == 'micarrito') ? 'class="active"' : '' ?>><a href="{{ action('CarritoComprasController@index') }}" data-toggle="tooltip" data-placement="bottom" data-title="Mi Carrito"><span class="glyphicon glyphicon-shopping-cart"></span> <span class="badge" id="cantidad_carrito">{{count(Cart::content())}}</span></a></li>
      		@if (Auth::guest())
        		<li><a href="{{url('login')}}" ><span class="glyphicon glyphicon-cog"></span></a></li>
        	@else
	        	<li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> {{\Auth::user()}} <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="{{action('UsuariosController@index') }}">Usuarios</a></li>
		            <li><a href="{{action('PedidosController@index') }}">Pedidos</a></li>
		            <li><a href="{{action('CategoriasController@index') }}">Categorias</a></li>
		            <li><a href="{{action('ProductosController@index') }}">Productos</a></li>
		            <li><a href="{{action('PromocionesController@index') }}">Promociones</a></li>
		            <li role="separator" class="divider"></li>
		            <li><a href="{{ action('UsuariosController@perfil', [\Auth::user()->id]) }}"><span class="glyphicon glyphicon-user"></span> Mi perfil</a></li>
		            <li><a href="{{url('auth/logout')}}"><span class="glyphicon glyphicon-off"></span> Cerrar Sesión</a></li>
		          </ul>
		        </li>
	        @endif
      	</ul>
	    </div><!-- /.navbar-collapse -->
	</div>
</nav>