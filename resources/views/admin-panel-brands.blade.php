<!-- Planilla default header y css -->
@extends('layout.admin.admin')

<!-- Nombre del titulo de la pagina -->
<?php $title   = 'Administration Panel'; ?>
<?php $section = 'Marcas'; ?>
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
                        <h1>{{ $section }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><a href="/adm/{{ $route }}">{{ $section }}</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-sm-12">
                        @if($event = app('request')->input('event'))
                            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                                <span class="badge badge-pill badge-success"><i class="fa fa-check"></i></span>
                                @if($event == 'create')
                                    La marca fue creada exitosamente.
                                @elseif($event == 'update')
                                    La marca fue editada exitosamente.
                                @elseif($event == 'delete')
                                    La marca fue borrada exitosamente.
                                @endif
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    <div class="col-md-12" style="padding-bottom: 20px">
                        <a href="/adm/{{ $route }}/create"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Nueva Marca</button></a>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">{{ $section }}</strong>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label class="form-control-label">Nombre</label>
                                        <form action="/adm/{{ $route }}/filters/name" method="GET" enctype="multipart/form-data">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                                <input class="form-control" type="text" name="name" value="@if(app('request')->input('name')) {{ app('request')->input('name') }} @endif">
                                                <button type="submi" class="btn btn-primary"><i class="fa fa-filter"></i>&nbsp; Filtrar</button>
                                            </div>
                                        </form>
                                        <small class="form-text text-muted">Nombre de la marca</small>
                                    </div>
                                </div>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Picture</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($brands as $brand)
                                        <tr>
                                            <td><figure class="img-table"><img src="/uploads/brands/{{ $brand->picture }}" alt=""></figure></td>
                                            <td>{{ $brand->name }}</td>
                                            <td>
                                                <a href="/adm/{{ $route }}/{{ $brand->id }}/edit"><i class="fa fa-pencil edit" aria-hidden="true"></i></a>
                                                <a href="/adm/{{ $route }}/{{ $brand->id }}/delete" onclick="return deleteConfirm()"><i class="fa fa-close delete" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $brands->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div>

    <!-- Right Panel -->

    <script src="{{ asset('admin/js/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins.js') }}"></script>
    <script src="{{ asset('admin/js/main.js') }}"></script>

    @include('layout/admin/validaciones')


@endsection