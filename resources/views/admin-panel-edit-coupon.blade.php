<!-- Planilla default header y css -->
@extends('layout.admin.admin')

<!-- Nombre del titulo de la pagina -->
<?php $title = 'Administration Panel'; ?>

@section('content')

    <!-- Header -->
    @include('layout.admin.header-admin')
    @include('layout.admin.aside')

    <section id="admin-panel-body">
        <h1>Editar Cupón</h1>
        

        <form action="/adm/coupons/{{$coupon->id}}/update" method="POST">
            {{ csrf_field() }}
            <label>
                <span>Nombre del cupon *</span>
                <input type="text" name="name" placeholder="Nombre del cupon *" required value="{{$coupon->name}}">
            </label>
            <label>
                <span>Valor del cupon *</span>
                <input type="number" name="value" min="1" max="100" required value="{{$coupon->value}}">
            </label>

            <br>

            <button type="submit" class="btn1">Editar Cupón</button>
        </form>
    
    </section>

    <div class="clear"></div>
    

@endsection