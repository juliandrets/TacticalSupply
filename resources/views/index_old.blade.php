
<!-- Planilla default header y css -->
@extends('layout.default')

<!-- Nombre del titulo de la pagina -->
<?php $title = 'Smart - Search, click, get it!'; ?>

@section('content')

    <!-- Header -->
    @include('layout.header-default')

    <div id="aa"></div>
    
    <section id="banner">
        <div id="wowslider-container1">
        <div class="ws_images">
            <ul>
                <li><a href="/products/19"><img src="img/portada3.jpg" alt="portada" title="portada" id="wows1_0"/></a></li>
                <li><a href="/products/34"><img src="img/portada2.jpg" alt="portada" title="portada" id="wows1_1"/></a></li>
            </ul>
        </div>
        </div>  
    </section>

    <section class="contenedor-index-home">

        <section class="new-arrivals-index">
            <div class="columna">

                <section class="oferts">
                    
                    <h2><strong>Ofertas</strong> en Smart!</h2>
                    <hr>
                    <ul class="slick">
                        <?php
                            // $i es el identificador de cada producto para poder asignarle una fecha de oferta a cada uno
                            $i = 0;   
                         ?>
                        @foreach($ofertBoxProducts as $product)
                        <?php $i++; ?>
                        <li class="item">
                            <section class="precio">

                                <?php  
                                    $ofertProduct = ($product->price * $product->ofert) / 100;
                                    $priceProduct = $product->price - $ofertProduct; 
                                ?>

                                <h3>${{$priceProduct}} <span>${{$product->price}}</span></h3>
                                <h4>{{$product->name}}</h4>

                                <div class="save">
                                    <p>ahorras</p>
                                    <span>${{$ofertProduct}}</span>
                                </div>
                            </section>

                            <a href="/products/{{$product->id}}"><figure>
                                <img src="uploads/products/{{$product->picture}}" alt="">
                            </figure></a>

                            <section class="stock">
                                <p class="l">Disponibles: <b>{{$product->stock}}</b></p>
                                <p class="r">Vendidos: <b>{{$product->sold}}</b></p>
                            </section>

                            <ul class="dias">
                                <li>
                                    <div class="c" id="dias{{$i}}"></div>
                                    <p>Dias</p>
                                </li>
                                <li>
                                    <div class="c" id="horas{{$i}}"></div>
                                    <p>Horas</p>
                                </li>
                                <li>
                                    <div class="c" id="minutos{{$i}}"></div>
                                    <p>Min</p>
                                </li>
                                <li>
                                    <div class="c" id="segundos{{$i}}"></div>
                                    <p>Seg</p>
                                </li>
                            </ul>

                            <script>
                                // Set the date we're counting down to
                                var countDownDate{{$i}} = new Date("{{$product->ofert_date}}").getTime();

                                // Update the count down every 1 second
                                var x = setInterval(function() {
                                  // Get todays date and time
                                  var now = new Date().getTime();

                                  // Find the distance between now an the count down date
                                  var distance = countDownDate{{$i}} - now;

                                  // Time calculations for days, hours, minutes and seconds
                                  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                  // Display the result in the element with id="demo"
                                  document.getElementById("dias{{$i}}").innerHTML = days;
                                  document.getElementById("horas{{$i}}").innerHTML = hours;
                                  document.getElementById("minutos{{$i}}").innerHTML = minutes;
                                  document.getElementById("segundos{{$i}}").innerHTML = seconds;

                                  
                                }, 1000);
                            </script>
                        </li>
                        @endforeach
                    </ul>   
                </section>
                
                <section class="products">
                    
                    <ul class="options">
                        <li id="b-ultimos-agregados" class="select">Últimos agregados</li>
                        <!--<li id="b-mas-vendidos">Más vendidos</li>-->
                        <li id="b-en-oferta">En Oferta</li>
                    </ul>

                    <div class="ultimos-agregados">
                        <ul class="products-ul ultimos-agregados">
                            @foreach($lastProducts as $product)
                            <?php  
                                $ofertProduct = ($product->price * $product->ofert) / 100;
                                $priceProduct = $product->price - $ofertProduct; 
                            ?>
                            <li>
                                <a href="/products/{{$product->id}}"><figure>
                                    <img src="/uploads/products/{{$product->picture}}" alt="">
                                    @if($product->ofert)<div class="ofert-box">-${{$ofertProduct}}</div>@endif
                                </figure></a>
                                <div class="price">
                                    @if($product->ofert)
                                        <span class="ofertProductTextColor" style='color:green'>${{$priceProduct}}</span>
                                        <span class="ofertProductSquare">OFERTA!</span>
                                    @else
                                        ${{$product->price}}
                                    @endif
                                </div>
                                <p> 
                                    {{$product->name}}
                                </p>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="mas-vendidos">
                        <ul class="products-ul mas-vendidos">
                            @foreach($soldProducts as $product)
                            <?php  
                                $ofertProduct = ($product->price * $product->ofert) / 100;
                                $priceProduct = $product->price - $ofertProduct; 
                            ?>
                            <li>
                                <a href="/products/{{$product->id}}"><figure>
                                    <img src="uploads/products/{{$product->picture}}" alt="">
                                    @if($product->ofert)<div class="ofert-box">-${{$ofertProduct}}</div>@endif
                                </figure></a>
                                <div class="price">
                                    @if($product->ofert)
                                        <span class="ofertProductTextColor" style='color:green'>${{$priceProduct}}</span>
                                        <span class="ofertProductSquare">OFERTA!</span>
                                    @else
                                        ${{$product->price}}
                                    @endif
                                </div>
                                <p> 
                                    {{$product->name}}
                                </p>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="en-oferta"> 
                        <ul class="products-ul en-oferta">
                            @foreach($ofertProducts as $product)
                            <?php  
                                $ofertProduct = ($product->price * $product->ofert) / 100;
                                $priceProduct = $product->price - $ofertProduct; 
                            ?>
                            <li>
                                <a href="/products/{{$product->id}}"><figure>
                                    <img src="uploads/products/{{$product->picture}}" alt="">
                                    @if($product->ofert)<div class="ofert-box">-${{$ofertProduct}}</div>@endif
                                </figure></a>
                                <div class="price">
                                    @if($product->ofert)
                                        <span class="ofertProductTextColor" style='color:green'>${{$priceProduct}}</span>
                                        <span class="ofertProductSquare">OFERTA!</span>
                                    @else
                                        ${{$product->price}}
                                    @endif
                                </div>
                                <p> 
                                    {{$product->name}}
                                </p>
                            </li>
                            @endforeach
                        </ul>
                    </div>  
                </section>
            </div>
        </section>

        <section class="app-banner">
            <p><i class="fa fa-mobile" aria-hidden="true"></i> Descargá nuestra app para celulares y busca lo que necesitas desde donde sea</p>

        </section>

        <section class="categorias">
            <h2>Nuestras Categorias</h2>

            <ul>
                @foreach($categories as $category)
                <li>
                    <figure><a href="/category/{{$category->name}}"><img src="/uploads/categories/{{$category->picture}}" alt=""></a></figure>

                    <h3>{{$category->name}}</h3>
                </li>
                @endforeach
            </ul>
        </section>

        <section id="tv-section">
            <section id="content">
                
                <div class="bar"></div>
                <h2><b>Power Audio & Visual</b> entertainment</h2>

                <ul>
                    @foreach($tvProducts as $product)
                    <?php  
                        $ofertProduct = ($product->price * $product->ofert) / 100;
                        $priceProduct = $product->price - $ofertProduct; 
                    ?>
                    <li>
                        <figure>
                            <a href="/products/{{$product->id}}">
                                <img src="/uploads/products/{{$product->picture}}" alt="">
                                @if($product->ofert)<div class="ofert-box">-${{$ofertProduct}}</div>@endif
                            </a>
                        </figure>
                        <article>
                            <h3>
                            @if($product->ofert)
                                <span class="ofertProductTextColor" style='color:green'>${{$priceProduct}}</span>
                                <span class="ofertProductSquare">OFERTA!</span>
                            @else
                                ${{$product->price}}
                            @endif
                            </h3>
                            <p>{{$product->name}}</p>
                            @if(Auth::user())
                            <form action="/cart/add" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                <button class="btn"><i class="fa fa-cart-plus" aria-hidden="true"></i> Agregar al carrito</button>
                            </form>
                            @else
                                <a href="/login"><button class="btn"><i class="fa fa-cart-plus" aria-hidden="true"></i> Agregar al carrito</button></a>
                            @endif
                        </article>
                    </li>
                    @endforeach
                </ul>
            </section>
        </section>

        <section id="desktop-section">
            <h2><b>Gaming</b> en Smart</h2>
            <hr>
            <ul>
                @foreach($desktopProducts as $product)
                <?php  
                    $ofertProduct = ($product->price * $product->ofert) / 100;
                    $priceProduct = $product->price - $ofertProduct; 
                ?>
                <li>
                    <a href="/products/{{$product->id}}"><figure>
                        <img src="uploads/products/{{$product->picture}}" alt="">
                        @if($product->ofert)<div class="ofert-box">-${{$ofertProduct}}</div>@endif
                    </figure></a>
                    <div class="price">
                        @if($product->ofert)
                            <span class="ofertProductTextColor" style='color:green'>${{$priceProduct}}</span>
                            <span class="ofertProductSquare">OFERTA!</span>
                        @else
                            ${{$product->price}}
                        @endif
                    </div>
                    <p> 
                        {{$product->name}}
                    </p>
                </li>
                @endforeach
            </ul>
        </section>

        <section id="desktop-section">
            <h2><b>Celulares</b> en Smart</h2>
            <hr>
            <ul>
                @foreach($phonesProducts as $product)
                <?php  
                    $ofertProduct = ($product->price * $product->ofert) / 100;
                    $priceProduct = $product->price - $ofertProduct; 
                ?>
                <li>
                    <a href="/products/{{$product->id}}"><figure>
                        <img src="uploads/products/{{$product->picture}}" alt="">
                        @if($product->ofert)<div class="ofert-box">-${{$ofertProduct}}</div>@endif
                    </figure></a>
                    <div class="price">
                        @if($product->ofert)
                            <span class="ofertProductTextColor" style='color:green'>${{$priceProduct}}</span>
                            <span class="ofertProductSquare">OFERTA!</span>
                        @else
                            ${{$product->price}}
                        @endif
                    </div>
                    <p> 
                        {{$product->name}}
                    </p>
                </li>
                @endforeach
            </ul>
        </section>

        <section id="desktop-section">
            <h2><b>Audio & Musica</b> en Smart</h2>
            <hr>
            <ul>
                @foreach($audioProducts as $product)
                <?php  
                    $ofertProduct = ($product->price * $product->ofert) / 100;
                    $priceProduct = $product->price - $ofertProduct; 
                ?>
                <li>
                    <a href="/products/{{$product->id}}"><figure>
                        <img src="uploads/products/{{$product->picture}}" alt="">
                        @if($product->ofert)<div class="ofert-box">-${{$ofertProduct}}</div>@endif
                    </figure></a>
                    <div class="price">
                        @if($product->ofert)
                            <span class="ofertProductTextColor" style='color:green'>${{$priceProduct}}</span>
                            <span class="ofertProductSquare">OFERTA!</span>
                        @else
                            ${{$product->price}}
                        @endif
                    </div>
                    <p> 
                        {{$product->name}}
                    </p>
                </li>
                @endforeach
            </ul>
        </section>

        <section id="brands-section">
            <ul class="slick-brands">
                @foreach($brands as $brand)
                    <li><a href="/brand/{{$brand->name}}"><figure><img src="uploads/brands/{{$brand->picture}}" alt=""></figure></a></li>
                @endforeach
            </ul>
        </section>
    </section>

    

    <!-- Incluyo el footer y los script -->
    @include('layout.footer')
    @include('layout.scripts')

    <!-- Wow Slider -->
    <script type="text/javascript" src="{{ asset('plugins/wow/wowslider.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/wow/script.js') }}"></script>

    <!-- Filtros index -->
    <script>
        $("#b-ultimos-agregados").click(function() {
            $('.en-oferta').hide();
            $('.mas-vendidos').hide();

            $(".ultimos-agregados").fadeIn("fast");
            $('.ultimos-agregados').show();

            $('#b-ultimos-agregados').addClass('select');
            $('#b-en-oferta').removeClass('select');
            $('#b-mas-vendidos').removeClass('select');
        });
        $("#b-mas-vendidos").click(function() {
            $('.en-oferta').hide();
            $('.ultimos-agregados').hide();
            
            $(".mas-vendidos").fadeIn("slow");
            $('.mas-vendidos').show();

            $('#b-ultimos-agregados').removeClass('select');
            $('#b-en-oferta').removeClass('select');
            $('#b-mas-vendidos').addClass('select');
        });
        $("#b-en-oferta").click(function() {
            $('.ultimos-agregados').hide();
            $('.mas-vendidos').hide();
            
            $(".en-oferta").fadeIn("slow");
            $('.en-oferta').show();

            $('#b-ultimos-agregados').removeClass('select');
            $('#b-en-oferta').addClass('select');
            $('#b-mas-vendidos').removeClass('select');
        });
    </script>

    <!-- Slick carrousel -->
    <script type="text/javascript" src="/plugins/slick/slick.min.js"></script>
    <script type="text/javascript">
         $(document).ready(function() {
            $('.slick').slick({
                autoplay: true,
                infinite: true,
                speed: 500,
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true
            });
        });
     </script>
     <script type="text/javascript">
         $(document).ready(function() {
            $('.slick-brands').slick({
                autoplay: true,
                infinite: true,
                speed: 500,
                slidesToShow: 8,
                slidesToScroll: 2,
                dots: false,
                responsive: [
                    {
                      breakpoint: 1024,
                      settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: false
                      }
                    },
                    {
                      breakpoint: 600,
                      settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        dots: false
                      }
                    },
                    {
                      breakpoint: 480,
                      settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: false
                      }
                    }
                ]

            });
        });
     </script>

@endsection