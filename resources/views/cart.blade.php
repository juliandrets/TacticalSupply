<!-- Planilla default header y css -->
@extends('layout.default')

<!-- Nombre del titulo de la pagina -->
<?php $title = 'Carrito - Smart'; ?>

@section('content')

    <!-- Header -->
    @include('layout.header-default')


    
    <section id="wishes">
        <h1>Mi carrito</h1>
        <?php $total = 0; ?>

        <table class="tg">
          <tr>
            <th class="tg-us36" style="width:30px "></th>
            <th class="tg-us36 imagen">Imagen</th>
            <th class="tg-us36">Producto</th>
            <th class="tg-us36 stock-tab">Stock</th>
            <th class="tg-us36">Precio</th>
          </tr>
          
          @foreach(Auth::user()->cart as $cart_item)
          <tr>
            <td class="tg-us36" style="width:30px; text-align: left;">
                <form action="/cart/delete" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$cart_item->id}}">
                   <button class="b"><i class="fa fa-close delete" aria-hidden="true"></i></button>
                </form>
            </td>
            <td class="tg-us36 imagen"><a href="/products/{{$cart_item->id}}"><figure><img src="/uploads/products/{{$cart_item->picture}}" alt=""></figure></a></td>
            <td class="tg-us36">{{$cart_item->name}}</td>
            <td class="tg-us36 stock-tab">@if($cart_item->stock) <b class="stock">En Stock</b> @else <b class="no-stock">Sin Stock</b> @endif</td>
            <td class="tg-us36">
                @if($cart_item->ofert)
                    <?php 
                        // agregamos el valor al total 
                        $ofertProduct = ($cart_item->price * $cart_item->ofert) / 100;
                        $priceProduct = $cart_item->price - $ofertProduct; 
                        $total += $priceProduct;
                    ?>
                    <b class="precio">${{$priceProduct}}</b> <div class="ofertProductSquare">OFERTA!</div>
                @else
                    <!-- Si no tiene stock no lo suma al total -->
                    @if($cart_item->stock)
                    <?php $total += $cart_item->price; ?>
                    @endif
                    <b class="precio">${{$cart_item->price}}</b>
                @endif
            </td>
          </tr>
          @endforeach
          
        </table>
    
        <form action="/cart/coupon/apply" method="POST" class="form-cupon">
            {{ csrf_field() }}
            <span>Cupón de descuento:</span>
            <input type="text" name="coupon" placeholder="Cupon">
            <button class="boton-redondeado r1">Aplicar cupón</button>
        </form>
        
        @if($coupon)
            <?php 
                $descuento = ($total * $coupon->value) / 100;
                $total = $total - $descuento;
            ?>
            <p class="carrito-total">
                <span>Cupón aplicado: {{$coupon->value}}% de descuento.</span>
                Total del carrito: <b>${{$total}}</b>
            </p>
        @else
            <p class="carrito-total">Total del carrito: <b>${{$total}}</b></p>
        @endif
    </section>

    <!-- Incluyo el footer y los script -->
    @include('layout.footer')
    @include('layout.scripts')

@endsection