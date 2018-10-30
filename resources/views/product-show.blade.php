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
            <a href="/category/{{ $product->category }}"><li class="cat">{{ $product->category }}</li> <i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <li>{{ $product->name }}</li>
        </ul>

        <?php  
            $ofertProduct = ($product->price * $product->ofert) / 100;
            $priceProduct = $product->price - $ofertProduct; 
        ?>

        <figure id="picture">
            <img src="/uploads/products/{{$product->picture}}" alt="">
            @if($product->ofert)<div class="ofert-box">Ahorras -${{$ofertProduct}}</div>@endif
            <figure><img src="/uploads/brands/{{$brand->picture}}" alt=""></figure>
        </figure>

        <article>
            <h2>
                {{$product->name}} 
                @if(Auth::user())
                <form action="/wish/add" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <button title="Agregar a la lista de deseos"><i class="fa fa-heart-o" aria-hidden="true"></i></button>
                </form>
                @else
                    <a href="/login" title="Agregar a la lista de deseos"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                @endif
            </h2>
            <hr>
            <a href="/brand/{{$brand->name}}"><img src="/uploads/brands/{{$brand->picture}}" alt="{{$brand->name}}" title="{{$brand->name}}"></a>
            <hr>
            <p>{{$product->description}}</p>

            @if($product->ofert)
                <h3 class="with-ofert">${{$product->price}}</h3>
                <h3>${{$priceProduct}}</h3>
            @else
                <h3>${{$product->price}}</h3>
            @endif

            
            @if(Auth::user())
            <form action="/cart/add" method="POST">
                <!--<label>
                    <span>Unidades</span>
                    <input type="number" value="1" min="1">
                </label>-->
                {{ csrf_field() }}
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <button><i class="fa fa-cart-plus" aria-hidden="true"></i> Agregar al carrito </button> <br>                
            </form>
            @else
                <p class="mensaje-no-carrito">Debes estar registrado para poder agregar items a tu carrito.</p>
            @endif

            
        </article>

    </section>

    <!-- Incluyo el footer y los script -->
    @include('layout.footer')
    @include('layout.scripts')

@endsection