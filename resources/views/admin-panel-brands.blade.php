<!-- Planilla default header y css -->
@extends('layout.admin.admin')

<!-- Nombre del titulo de la pagina -->
<?php $title = 'Administration Panel'; ?>

@section('content')

    <!-- Header -->
    @include('layout.admin.header-admin')
    @include('layout.admin.aside')

    <section id="admin-panel-body">
        <h1>Marcas</h1>
        
        <section id="btns">
            <a href="brands/create"><div class="btn1">Nueva Marca</div></a>
        </section>
    
        <table class="tg">
          <tr>
            <th class="tg-us36" style="width: 80px;">Imagen</th>
            <th class="tg-us36">Nombre</th>
            <th class="tg-us36"></th>
          </tr>
          @foreach($brands as $brand)
          <tr>
            <td class="tg-us36"><figure><img src="/uploads/brands/{{ $brand->picture }}" alt=""></figure></td>
            <td class="tg-us36">{{ $brand->name }}</td>
            <td class="tg-us36" align="center">
                <a href="/adm/brands/{{ $brand->id }}/edit"><i class="fa fa-pencil-square-o edit" aria-hidden="true"></i></a>
                <a href="/adm/brands/{{ $brand->id }}/delete" onclick="return deleteConfirm()"><i class="fa fa-close delete" aria-hidden="true"></i></a>
            </td>
          </tr>
          @endforeach
        </table>
    </section>

    <div class="clear"></div>

    @include('layout/admin/validaciones')
    

@endsection