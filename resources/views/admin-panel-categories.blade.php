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
            <a href="categories/create"><div class="btn1">Nueva Categoria</div></a>
        </section>
    
        <table class="tg">
          <tr>
            <th class="tg-us36"></th>
            <th class="tg-us36">Nombre</th>
            <th class="tg-us36"></th>
          </tr>
          @foreach($categories as $category)
          <tr>
            <td class="tg-us36" style="width: 20px;"><figure><img src="/uploads/categories/{{ $category->picture }}" alt=""></figure></td>
            <td class="tg-us36">{{ $category->name }}</td>
            <td class="tg-us36" align="center">
                <a href="/adm/categories/{{ $category->id }}/edit"><i class="fa fa-pencil-square-o edit" aria-hidden="true"></i></a>
                <a href="/adm/categories/{{ $category->id }}/delete" onclick="return deleteConfirm()"><i class="fa fa-close delete" aria-hidden="true"></i></a>
            </td>
          </tr>
          @endforeach
        </table>
    </section>

    <div class="clear"></div>

    @include('layout/admin/validaciones')
    

@endsection