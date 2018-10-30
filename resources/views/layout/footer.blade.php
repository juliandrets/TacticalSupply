<footer>
	<section class="align">
		<section>
			<h2>Links</h2>
			<ul>
				<li>Inicio</li>
				<li>FAQs</li>
				<li>Contacto</li>
				<li>Nuestro equipo</li>
				<li>Empleos</li>
			</ul>
			<br>
			<span>Ya somos <span id="usercount">0</span> usuarios registrados!</span>
		</section>
		<section>
			<h2>Redes</h2>
			<ul>
				<li><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</li>
				<li><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</li>
				<li><i class="fa fa-youtube-play" aria-hidden="true"></i> Youtube</li>
				<li><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</li>
				<li><i class="fa fa-pinterest" aria-hidden="true"></i> Pinterest</li>
			</ul>
		</section>
	</section>

	<section class="copy">SMART <i class="fa fa-copyright" aria-hidden="true"></i> 2018</section>
</footer>

<section id="footer-bar-responsive">

	@if(Auth::check())
	<ul class="registrado">
		<a href="/wishes"><li>
			<i class="fa fa-heart-o" aria-hidden="true"></i>
			<div class="numero">
				@if(Auth::user())
					{{count(Auth::user()->wishes)}}
				@else
					0
				@endif
			</div>
		</li></a>
		<a href="/notifications"><li>
			<i class="fa fa-globe" aria-hidden="true"></i>
			<div class="numero" id="numeroNotificaciones">
				@if(Auth::user())
					{{count(Auth::user()->notifications)}}
				@else
					0
				@endif
			</div>
		</li></a>
		<a href="/cart"><li>
			<i class="fa fa-shopping-basket" aria-hidden="true"></i>
			<div class="numero">
				@if(Auth::user())
					{{count(Auth::user()->cart)}}
				@else
					0
				@endif
			</div>
		</li></a>
		<a href="/profile"><li>
			<i class="fa fa-user-o" aria-hidden="true"></i>
		</li></a>
	</ul>
	@else
	<ul class="no-registrado">
		<a href="/login"><li><i class="fa fa-plug" aria-hidden="true"></i> Conectarme</li></a>
		<a href="/register"><li><i class="fa fa-plus" aria-hidden="true"></i> Registrarme</li></a>
	</ul>
	@endif

</section>


