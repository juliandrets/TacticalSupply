<!-- Planilla default header y css -->
@extends('layout.admin.admin')

<!-- Nombre del titulo de la pagina -->
<?php $title = 'Administration Panel'; ?>

@section('content')

    <!-- Header -->
    @include('layout.admin.header-admin')
    @include('layout.admin.aside')

    <section id="admin-panel-body">
        <h1>Crear Cupón</h1>
        

        <form action="/adm/coupons" method="POST">
            {{ csrf_field() }}
            <label>
                <span>Nombre del cupon *</span>
                <input type="text" name="name" placeholder="Nombre del cupon *" required>
            </label>
            <label>
                <span>Valor del cupon *</span>
                <input type="number" name="value" value="1" min="1" max="100" required>
            </label>

            <br>

            <button type="submit" class="btn1">Crear Cupón</button>
        </form>
    
    </section>

    <div class="clear"></div>
    

@endsection