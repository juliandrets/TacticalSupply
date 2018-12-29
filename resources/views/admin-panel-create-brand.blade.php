<!-- Planilla default header y css -->
@extends('layout.admin.admin')

<!-- Nombre del titulo de la pagina -->
<?php $title   = 'Administration Panel'; ?>
<?php $section = 'Marca'; ?>
<?php $route   = 'brands'; ?>

@section('content')

    <!-- Header -->
    @include('layout.admin.aside')

    <div id="right-panel" class="right-panel">

        @include('layout.admin.header-admin')

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Crear {{ $section }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><a href="/adm/{{ $route }}">{{ $section }}</a></li>
                            <li class="active"><a href="/adm/{{ $route }}/create">Nuevo/a {{ $section }}</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12" style="padding-bottom: 20px">
                        <a href="/adm/{{ $route }}/"><button type="button" class="btn btn-primary"><i class="fa fa-angle-left"></i>&nbsp; Volver</button></a>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Nuevo/a {{ $section }}</strong>
                            </div>
                            <form action="/adm/{{ $route }}" method="POST"  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body card-block">
                                    <div class="form-group col-12">
                                        <label class=" form-control-label">Imagen</label>

                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-image"></i></div>
                                            <input class="form-control" type="file" name="picture" accept="image/*" style="font-size: 12px">
                                        </div>
                                        <small class="form-text text-muted">Preferentemente formato JPG</small>
                                    </div>

                                    <div class="form-group col-12">
                                        <label class=" form-control-label">Nombre</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                            <input class="form-control" type="text" name="name" placeholder="Nombre de la marca *" required>
                                        </div>
                                        <small class="form-text text-muted">Ejemplo: Emerson</small>
                                    </div>

                                    <div class="form-group col-12">
                                        <div class="input-group">
                                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp; Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div>

    <!-- Right Panel -->

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <script src="{{ asset('admin/js/plugins.js') }}"></script>
    <script src="{{ asset('admin/js/main.js') }}"></script>

    @include('layout/admin/validaciones')
@endsection