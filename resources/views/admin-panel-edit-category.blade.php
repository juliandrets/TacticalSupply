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
        

        <form action="/adm/categories/{{$category->id}}/update" method="POST"  enctype="multipart/form-data">
            {{ csrf_field() }}
            <label>
                <span>Imagen del producto</span>
                <figure>
                    <img src="/uploads/categories/{{ $category['picture'] }}" alt="">
                </figure>
                <input type="file" name="picture" value="{{$category->picture}}">
            </label>
            <label>
                <span>Nombre de la categoria *</span>
                <input type="text" name="name" placeholder="Nombre de la categoria *" required value="{{$category->name}}">
            </label>

            <button type="submit" class="btn1">Editar Categoria</button>
        </form>
    
    </section>

    <div class="clear"></div>
    

@endsection