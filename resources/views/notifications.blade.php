<!-- Planilla default header y css -->
@extends('layout.default')

<!-- Nombre del titulo de la pagina -->
<?php $title = 'Lista de deseos - Smart'; ?>

@section('content')

    <!-- Header -->
    @include('layout.header-default')


    
    <section id="wishes">
        <h1>Notificaciones</h1>
        <p class="sub">Algunos productos de tu lista de deseos estan en oferta!</p>

        <table class="tg">
          <tr>
            <th class="tg-us36" style="width:30px "></th>
            <th class="tg-us36" style="width: 80px;">Imagen</th>
            <th class="tg-us36">Producto</th>
            <th class="tg-us36">Stock</th>
            <th class="tg-us36">Precio</th>
            <th class="tg-us36" style="width: 200px"></th>
          </tr>
          
          @foreach(Auth::user()->notifications as $notification)
          <tr>
            <td class="tg-us36" style="width:30px; text-align: left;">
                <form action="/notification/delete" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$notification->id}}">
                   <button class="b"><i class="fa fa-close delete" aria-hidden="true"></i></button>
                </form>
            </td>
            <td class="tg-us36" style="width: 80px;"><a href="/products/{{$notification->id}}"><figure><img src="/uploads/products/{{$notification->picture}}" alt=""></figure></a></td>
            <td class="tg-us36">{{$notification->name}}</td>
            <td class="tg-us36">@if($notification->stock) <b class="stock">En Stock</b> @else <b class="no-stock">Sin Stock</b> @endif</td>
            <td class="tg-us36">
                @if($notification->ofert)
                    <?php  
                        $ofertProduct = ($notification->price * $notification->ofert) / 100;
                        $priceProduct = $notification->price - $ofertProduct; 
                    ?>
                    <b class="precio">${{$priceProduct}}</b> <div class="ofertProductSquare">OFERTA!</div>
                @else
                    <b class="precio">${{$notification->price}}</b>
                @endif
            </td>
             <td class="tg-us36"  style="width: 200px">
                <form action="/cart/add" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="product_id" value="{{$notification->id}}">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <button class="boton-redondeado r1"><i class="fa fa-cart-plus" aria-hidden="true"></i> Agregar al carrito</button>
                </form>
             </td>
          </tr>
          @endforeach
          
        </table>
    </section>

    <!-- Incluyo el footer y los script -->
    @include('layout.footer')
    @include('layout.scripts')

@endsection