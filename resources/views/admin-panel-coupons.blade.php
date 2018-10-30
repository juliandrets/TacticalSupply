<!-- Planilla default header y css -->
@extends('layout.admin.admin')

<!-- Nombre del titulo de la pagina -->
<?php $title = 'Administration Panel'; ?>

@section('content')

    <!-- Header -->
    @include('layout.admin.header-admin')
    @include('layout.admin.aside')

    <section id="admin-panel-body">
        <h1>Cupones</h1>
        
        <section id="btns">
            <a href="/adm/coupons/create"><div class="btn1">Nuevo Cupon</div></a>
        </section>
    
        <table class="tg">
          <tr>
            <th class="tg-us36">Nombre</th>
            <th class="tg-us36">Porcentaje</th>
            <th class="tg-us36">Disponible</th>
            <th class="tg-us36"></th>
          </tr>
          @foreach($coupons as $coupon)
          <tr>
            <td class="tg-us36">{{ $coupon->name }}</td>
            <td class="tg-us36">{{ $coupon->value }}%</td>
            <td class="tg-us36">@if($coupon->state) Activo @else No disponible @endif</td>
            <td class="tg-us36" align="center">
                <a href="/adm/coupons/{{ $coupon->id }}/edit"><i class="fa fa-pencil-square-o edit" aria-hidden="true"></i></a>
                <a href="/adm/coupons/{{ $coupon->id }}/delete" onclick="return deleteConfirm()"><i class="fa fa-close delete" aria-hidden="true"></i></a>
            </td>
          </tr>
          @endforeach
        </table>
    </section>

    <div class="clear"></div>

    @include('layout/admin/validaciones')
    

@endsection