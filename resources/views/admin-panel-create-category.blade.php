<!-- Planilla default header y css -->
@extends('layout.admin.admin')

<!-- Nombre del titulo de la pagina -->
<?php $title = 'Administration Panel'; ?>

@section('content')

    <!-- Header -->
    @include('layout.admin.header-admin')
    @include('layout.admin.aside')

    <section id="admin-panel-body">
        <h1>Crear Categoria</h1>
        

        <form action="/adm/categories" method="POST"  enctype="multipart/form-data">
            {{ csrf_field() }}
            <label>
                <span>Imagen del producto</span>
                <input type="file" name="picture">
            </label>
            <label>
                <span>Nombre de la categoria *</span>
                <input type="text" name="name" placeholder="Nombre de la categoria *" required>
            </label>

            <button type="submit" class="btn1">Crear Categoria</button>
        </form>
    
    </section>

    <div class="clear"></div>
    

@endsection