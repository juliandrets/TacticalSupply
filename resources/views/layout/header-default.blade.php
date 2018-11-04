<section id="loading">
	<div class="sk-circle">
	  <div class="sk-circle1 sk-child"></div>
	  <div class="sk-circle2 sk-child"></div>
	  <div class="sk-circle3 sk-child"></div>
	  <div class="sk-circle4 sk-child"></div>
	  <div class="sk-circle5 sk-child"></div>
	  <div class="sk-circle6 sk-child"></div>
	  <div class="sk-circle7 sk-child"></div>
	  <div class="sk-circle8 sk-child"></div>
	  <div class="sk-circle9 sk-child"></div>
	  <div class="sk-circle10 sk-child"></div>
	  <div class="sk-circle11 sk-child"></div>
	  <div class="sk-circle12 sk-child"></div>
	</div>
</section>

<div class="blur"></div>

<header>

	@if(Auth::check() && Auth::user()->role_id == 1)
		<section id="admin-header">
			<p>Estas logeado como administrador, podes entrar al panel desde <a href="/adm/">aquí.</a></p>
		</section>
	@endif

	<section id="top-bar">
		
	</section>
	<section id="header-align">
		<nav>
			<a href="/index"><img src="/img/logo.png" alt="" class="logo-header"></a>
			<ul class="menu-no-responsive">
				<li><a href="/oferts">Nosotros</a></li>
				<li><a href="/contact">Contacto</a></li>
				<li><a href="/oferts">Ofertas</a></li>
			</ul>
			@if(Auth::check())
			<a href="/profile">
			<section class="usuario-header">
				<figure><img src="/uploads/avatars/{{Auth::user()->avatar}}" alt=""></figure>
				<div>{{Auth::user()->name}} <i class="fa fa-angle-down" aria-hidden="true"></i>
					<ul>
						<a href="/profile"><li><i class="fa fa-user" aria-hidden="true"></i> Ver mi perfil</li></a>
						<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><li>
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                            {{ __('Cerrar Sesión') }}
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        </a>
					</ul>
				</div>
			</section>
			</a>
			@endif
			@if(!Auth::check())
			<ul class="login-header">
				<li>
					<a href="/login"><i class="fa fa-user" aria-hidden="true"></i> Conectarme </a>
				</li>			
				<li>
					<a href="/register"><i class="fa fa-user-plus" aria-hidden="true"></i> Registrarme</a>
				</li>
			</ul>
			@endif

			
		</nav>
		<div class="clear"></div>
		<section id="bottom-bar">
			<!-- Boton de categorias -->
			<div class="boton-categorias">
				<i class="fa fa-shopping-bag" aria-hidden="true"></i> <span>SHOP</span>

				<ul class="categorias-ul">
					@foreach(\App\Category::all() as $category)
						<a href="/category/{{$category->name}}"><li>{{$category->name}}</li></a>
					@endforeach
				</ul>
			</div>
			<div class="boton-categorias-responsive">
				<i class="fa fa-bars" aria-hidden="true"></i> <span>Todas las Categorias</span>

				<ul class="categorias-ul-responsive">
					@foreach(\App\Category::all() as $category)
						<a href="/category/{{$category->name}}"><li>{{$category->name}}</li></a>
					@endforeach
				</ul>
			</div>
	

			<!-- Buscar -->
			<div class="buscar-header">
				<form action="/search" method="POST">
					{{ csrf_field() }}
					<input type="text" name="search" id="buscar-input" placeholder="Buscar productos" required>
					<button>
						<i class="fa fa-search" aria-hidden="true"></i>
					</button>
				</form>
			</div>

			<!-- Iconos -->
			<div class="iconos-header">
				<ul class="iconos">
					<!-- Favoritos -->
					<li>
						@if(Auth::check())
						<a href="/wishes/">
						@else
						<a href="/login/">
						@endif
						<div>
							<i class="fa fa-heart-o" aria-hidden="true"></i>
							<div class="numero">
								@if(Auth::user())
									{{count(Auth::user()->wishes)}}
								@else
									0
								@endif
							</div>
						</div>
						</a>
						@if(Auth::user())
						<ul <?php if(!count(Auth::user()->wishes)) { echo 'class="hoverno"'; } else { echo 'class="hoversi"';} ?> >
							@foreach(Auth::user()->wishes as $wish)
								<a href="/products/{{$wish->id}}"><li>
									<figure><img src="/uploads/products/{{$wish->picture}}" alt=""></figure>
									<article><p>{{$wish->name}}</p></article>
								</li></a>
							@endforeach
						</ul>
						@endif
					</li>
					<!-- Notificaciones -->
					<li id="notifications">
						@if(Auth::check())
						<a href="/notifications/">
						@else
						<a href="/login/">
						@endif
						<div>
							<i class="fa fa-globe" aria-hidden="true"></i>
							<div class="numero" id="numeroNotificaciones">
								@if(Auth::user())
									{{count(Auth::user()->notifications)}}
								@else
									0
								@endif
							</div>
						</div>
						</a>
						@if(Auth::user())
						<ul <?php if(!count(Auth::user()->notifications)) { echo 'class="hoverno"'; } else { echo 'class="hoversi"';} ?> >
							@foreach(Auth::user()->notifications as $notification)
								<a href="/products/{{$notification->id}}"><li>
									<figure><img src="/uploads/products/{{$notification->picture}}" alt=""></figure>
									<article>
										<p>
											<span>Un articulo de tu lista de deseos esta en oferta!</span> 
										</p>
									</article>
								</li></a>
							@endforeach
						</ul>
						@endif
					</li>
					<!--<li> <button id="cambiar">Cambiar</button>
						<p id="parrafo"></p></li>-->
					<!-- Carrito -->
					<li>
						@if(Auth::check())
						<a href="/cart/">
						@else
						<a href="/login/">
						@endif
						<div>
							<i class="fa fa-shopping-basket" aria-hidden="true"></i>
							<div class="numero">
								@if(Auth::user())
									{{count(Auth::user()->cart)}}
								@else
									0
								@endif
							</div>
						</div>
						</a>
						@if(Auth::user())
						<ul <?php if(!count(Auth::user()->cart)) { echo 'class="hoverno"'; } else { echo 'class="hoversi"';} ?> >
							<?php $total = 0; ?>
							@foreach(Auth::user()->cart as $cart_item)
								<a href="/products/{{$cart_item->id}}"><li>
									<figure><img src="/uploads/products/{{$cart_item->picture}}" alt=""></figure>
									<article><p>{{$cart_item->name}}</p></article>
								</li></a>
							@endforeach
						</ul>
						@endif
					</li>
					<!-- Cantidad en carrito -->
					<li>
						@if(Auth::user())
						@foreach(Auth::user()->cart as $cart_item)
						@if($cart_item->ofert)
		                    <?php  
		                        $ofertProduct = ($cart_item->price * $cart_item->ofert) / 100;
		                        $priceProduct = $cart_item->price - $ofertProduct; 
		                        $total += $priceProduct;
		                    ?>
	                    @else
	                    	<?php 
	                    		$total += $cart_item->price;
	                    	?>
	                    @endif
	                    @endforeach
						<div class="carrito-item">Tu Carrito <br> <b>${{$total}}</b></div>
						@else
						<div class="carrito-item">Tu Carrito <br> <b>$0</b></
						@endif
					</li>
				</ul>
			</div>
			<div class="clear"></div>
		</section>

	</section>

	
</header>