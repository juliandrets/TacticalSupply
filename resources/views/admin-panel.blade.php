<!-- Planilla default header y css -->
@extends('layout.admin.admin')

<!-- Nombre del titulo de la pagina -->
<?php $title = 'Administration Panel'; ?>

@section('content')

    <!-- Header -->
    @include('layout.admin.header-admin')
    @include('layout.admin.aside')

    <section id="admin-panel-body">
        <h1>Productos</h1>
        
        <section id="btns">
            <a href="/adm/products/create"><div class="btn1">Nuevo producto</div></a>
        </section>
    
        <table class="tg">
          <tr>
            <th class="tg-us36"></th>
            <th class="tg-us36">Titulo</th>
            <th class="tg-us36">Precio</th>
            <th class="tg-us36">Stock</th>
            <th class="tg-us36">Vendidos</th>
            <th class="tg-us36">Oferta</th>
            <th class="tg-us36">ID</th>
            <th class="tg-us36"></th>
          </tr>
          @foreach($products as $product)
          <tr>
            <td class="tg-us36" style="width: 50px;"><figure><img src="/uploads/products/{{ $product->picture }}" alt=""></figure></td>
            <td class="tg-us36">{{ $product->name }}</td>
            <td class="tg-us36">${{ $product->price }}</td>
            <td class="tg-us36">{{ $product->stock }}</td>
            <td class="tg-us36">{{ $product->sold }}</td>
            <td class="tg-us36">@if($product->ofert) <span style="color: green">{{ $product->ofert }}% <i class="fa fa-gift" aria-hidden="true"></i> </span> @endif</td>
            <td class="tg-us36">{{ $product->id }}</td>
            <td class="tg-us36" align="center">
                <a href="/adm/products/{{ $product->id }}/edit"><i class="fa fa-pencil-square-o edit" aria-hidden="true"></i></a>
                <a href="/adm/products/{{ $product->id }}/delete" onclick="return deleteConfirm()"><i class="fa fa-close delete" aria-hidden="true"></i></a>
            </td>
          </tr>
          @endforeach
        </table>

        {{ $products->links() }}
    </section>

    <div class="clear"></div>

    @include('layout/admin/validaciones')
    

@endsection