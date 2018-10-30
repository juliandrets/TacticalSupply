<!-- Planilla default header y css -->
@extends('layout.admin.admin')

<!-- Nombre del titulo de la pagina -->
<?php $title = 'Administration Panel'; ?>

@section('content')

    <!-- Header -->
    @include('layout.admin.header-admin')
    @include('layout.admin.aside')

    <section id="admin-panel-body">
        <h1>Editar Producto</h1>
        
        <section id="btns">
            <a href="adm/products/create"><div class="btn1">Nuevo producto</div></a>
        </section>

        
        <form action="/adm/products/{{$product['id']}}/update" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <label>
                <span>Imagen del producto</span> 
                <figure>
                    <img src="/uploads/products/{{ $product['picture'] }}" alt="">
                </figure>
                <input type="file" name="picture">
            </label>
            <label>
                <span>Nombre del producto *</span>
                <input type="text" name="name" placeholder="Nombre del producto *" required value="{{ $product['name'] }}">
            </label>
            <label>
                <span>Precio</span>
                <input type="number" name="price" required min="1" value="{{ $product['price'] }}">
            </label>
            <label>
                <span>Stock</span>
                <input type="number" name="stock" required min="0" value="{{ $product['stock'] }}">
            </label>
            <label>
                <span>Oferta (en porcentaje)</span>
                <input type="number" name="ofert" min="0" value="{{$product->ofert}}">
            </label>
            <label>
                <span>Oferta hasta</span>
                <input type="date" name="ofert_date" value="{{$product->ofert_date}}">
            </label>
            <label>
                <span>Categoria</span>
                <select name="category">
                    @foreach($categories as $category)
                        <option value="{{ $category['name'] }}" @if($product['category'] == $category['name']) selected @endif>{{ $category['name'] }}</option>
                    @endforeach
                </select>
            </label>
            <label>
                <span>Marca</span>
                <select name="brand">
                    @foreach($brands as $brand)
                        <option value="{{ $brand['name'] }}" @if($product['brand'] == $brand['name']) selected @endif>{{ $brand['name'] }}</option>
                    @endforeach
                </select>
            </label>
            <label>
                <span>Descripcion del producto *</span>
                <textarea name="description" required="">{{ $product['description'] }}</textarea>
            </label>

            <button type="submit" class="btn1">Editar Producto</button>
        </form>
        
    
    </section>

    <div class="clear"></div>
    

@endsection