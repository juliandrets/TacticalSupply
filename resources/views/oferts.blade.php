<!-- Planilla default header y css -->
@extends('layout.default')

<!-- Nombre del titulo de la pagina -->
<?php $title = 'Ofertas Imperdibles - Smart'; ?>

@section('content')

    <!-- Header -->
    @include('layout.header-default')


    <section id="category">
        <aside>
            <ul class="categories">
                <h2>Nuestras Categorias</h2>
                <div>
                @foreach($categories as $category)
                <li>
                    <a href="/category/{{$category->name}}">
                        {{$category->name}}
                    </a>
                </li>
                @endforeach
                </div>
            </ul>


            <section id="latest-products">
                <h3>Últimos productos</h3>
                <ul class="products">
                    @foreach($latestProducts as $product)
                    <?php  
                        $ofertProduct = ($product->price * $product->ofert) / 100;
                        $priceProduct = $product->price - $ofertProduct; 
                    ?>
                    <li>
                        <a href="/products/{{$product->id}}"><figure>
                            <img src="/uploads/products/{{$product->picture}}" alt="">
                            @if($product->ofert)<div class="ofert-box">-${{$ofertProduct}}</div>@endif
                        </figure></a>
                        <section class="data">
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
                        </section>
                    </li>
                    @endforeach
                </ul>
            </section>
        </aside>
        <section class="container">


            <h2 class="title-category">Ofertas <b>en Smart</b> </h2>

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