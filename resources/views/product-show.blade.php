<!-- Planilla default header y css -->
@extends('layout.default')

<!-- Nombre del titulo de la pagina -->
<?php $title = $product->name.' - Smart'; ?>

@section('content')

    <!-- Header -->
    @include('layout.header-default')


    <section id="view-product">

        <ul id="navigate">
            <a href="/index"><li>Home</li> <i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="/category/{{ $product->category->name }}"><li class="cat">{{ $product->category->name }}</li> <i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="/category/{{ $product->subcategory->name }}"><li class="cat">{{ $product->subcategory->name }}</li> <i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <li>{{ $product->name }}</li>
        </ul>

        <?php  
            $ofertProduct = ($product->price * $product->ofert) / 100;
            $priceProduct = $product->price - $ofertProduct; 
        ?>

        <figure id="picture">
            <img src="/uploads/products/{{$product->picture}}" alt="">
            @if($product->ofert)<div class="ofert-box">Ahorras -${{$ofertProduct}}</div>@endif
        </figure>

        <article>
            <h4>{{ $product->category->name }}</h4>
            <h2>
                {{$product->name}}
                @if(Auth::user())
                <form action="/wish/add" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <button title="Agregar a la lista de deseos" class="deseos"><i class="fa fa-heart-o" aria-hidden="true"></i></button>
                </form>
                @else
                    <a href="/login" title="Agregar a la lista de deseos"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                @endif
            </h2>

            <hr>

            @if($product->ofert)
                <h3 class="with-ofert">${{$product->price}}</h3>
                <h3>${{$priceProduct}}</h3>
            @else
                <h3 class="price">{{ $product->currency }} ${{$product->price}}</h3>
            @endif

            <form action="/cart/add" method="POST">
                @if (Auth::user())
                    {{ csrf_field() }}
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <button class="addcart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Comprar </button>
                @else
                    <a href="/login"><button class="addcart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Comprar </button></a>
                @endif
            </form>

            <hr>

            <p class="description">{{ $product->description }}</p>

            
        </article>

    </section>

    <!-- Incluyo el footer y los script -->
    @include('layout.footer')
    @include('layout.scripts')

@endsection