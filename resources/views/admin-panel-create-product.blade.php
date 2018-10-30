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

        <form action="/adm/products" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <label>
                <span>Imagen del producto</span>
                <input type="file" name="picture">
            </label>
            <label>
                <span>Nombre del producto *</span>
                <input type="text" name="name" placeholder="Nombre del producto *" required>
            </label>
            <label>
                <span>Precio *</span>
                <input type="number" name="price" required min="1" value="1" >
            </label>
            <label>
                <span>Stock *</span>
                <input type="number" name="stock" required min="0" value="0" >
            </label>
            <label>
                <span>Oferta (en porcentaje)</span>
                <input type="number" name="ofert" min="0" value="0">
            </label>
            <label>
                <span>Oferta hasta</span>
                <input type="date" name="ofert_date">
            </label>
            <label>
                <span>Categoria *</span>
                <select name="category">
                    @foreach($categories as $category)
                        <option value="{{ $category['name'] }}">{{ $category['name'] }}</option>
                    @endforeach
                </select>
            </label>
            <label>
                <span>Marca</span>
                <select name="brand">
                    @foreach($brands as $brand)
                        <option value="{{ $brand['name'] }}">{{ $brand['name'] }}</option>
                    @endforeach
                </select>
            </label>
            <label>
                <span>Descripcion del producto *</span>
                <textarea name="description" required=""></textarea>
            </label>

            <button type="submit" class="btn1">Crear Producto</button>
        </form>
    
    </section>

    <div class="clear"></div>
    

@endsection