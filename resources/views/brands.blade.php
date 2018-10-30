<!-- Planilla default header y css -->
@extends('layout.default')

<!-- Nombre del titulo de la pagina -->
<?php $title = $brandTitle->name.' - Smart'; ?>

@section('content')

    <!-- Header -->
    @include('layout.header-default')


    <section id="category">
        <aside>
            <ul class="categories">
                <h2>Nuestras Marcas</h2>
                <div>
                @foreach($brands as $brand)
                <li>
                    <a href="/brand/{{$brand->name}}">
                        @if($brand->name == $brandTitle->name)
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                        @endif
                        {{$brand->name}}
                    </a>
                </li>
                @endforeach
                </div>
            </ul>
        </aside>
        <section class="container">

            <h2 class="title-category" style="text-align: center;"><img src="/uploads/brands/{{$brandTitle->picture}}" alt=""></h2>

            <ul class="products">
                @foreach($products as $product)
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
            {{ $products->links() }}
        </section>
    </section>

    <!-- Incluyo el footer y los script -->
    @include('layout.footer')
    @include('layout.scripts')

@endsection