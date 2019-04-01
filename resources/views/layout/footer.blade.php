<footer>
	<section class="align">
		<section>
			<img src="/img/logo.png" alt="" class="footer-logo">
		</section>
		<section>
			<h2>Productos</h2>
			<ul>
				@foreach(\App\Category::all() as $category)
					<li>{{ $category->name }}</li>
				@endforeach
			</ul>
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

	<section class="copy">Tactical Supply <i class="fa fa-copyright" aria-hidden="true"></i> 2019</section>
</footer>