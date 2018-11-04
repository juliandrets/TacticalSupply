
<!-- Planilla default header y css -->
@extends('layout.default')

<!-- Nombre del titulo de la pagina -->
<?php $title = 'Smart - Search, click, get it!'; ?>

@section('content')

    <!-- Header -->
    @include('layout.header-default')
    
    <ul id="banner">
        @foreach($sliders as $slider)
            <li>
                <figure><img src="/uploads/sliders/{{ $slider->picture }}" alt=""></figure>
                <section>
                    <div class="banner-content">
                        <div class="content">
                            <h2>{{ $slider->title }}</h2>
                            @if($slider->subtitle)
                                <p>{{ $slider->subtitle }}</p>
                            @endif
                            @if($slider->link)
                                <a href="{{ $slider->link }}" target="_blank"><div class="boton">Ver más</div></a>
                            @endif
                        </div>
                    </div>
                </section>
            </li>
        @endforeach
    </ul>

    <section class="home">
        <section class="products-index">
            <section class="products">
                <ul class="products-ul">
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
                        <p>
                            {{$product->name}}
                        </p>
                        <div class="price">
                            @if($product->ofert)
                                <span class="ofertProductTextColor" style='color:green'>${{$priceProduct}}</span>
                                <span class="ofertProductSquare">OFERTA!</span>
                            @else
                                ${{$product->price}}
                            @endif
                        </div>

                        <ul class="buttons">
                            <li>Ver más</li>
                            <li>Comprar</li>
                        </ul>
                    </li>
                    @endforeach
                </ul>
                </div>
            </section>
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