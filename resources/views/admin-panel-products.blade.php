<!-- Planilla default header y css -->
@extends('layout.admin.admin')

<!-- Nombre del titulo de la pagina -->
<?php $title = 'Administration Panel'; ?>

@section('content')

    <!-- Header -->
    @include('layout.admin.aside')

    <div id="right-panel" class="right-panel">

        @include('layout.admin.header-admin')

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Productos</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><a href="/adm/productos">Productos</a></li>
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
                                    El producto fue creado exitosamente.
                                @elseif($event == 'update')
                                    El producto fue editado exitosamente.
                                @elseif($event == 'delete')
                                    El producto fue borrado exitosamente.
                                @endif
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    <div class="col-md-12" style="padding-bottom: 20px">
                        <a href="/adm/products/create"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Nuevo Producto</button></a>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Productos</strong>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                        <div class="form-group col-4">
                                            <label class="form-control-label">Nombre</label>
                                            <form action="/adm/products/filters/name" method="GET" enctype="multipart/form-data">
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                                    <input class="form-control" type="text" name="name" value="@if(app('request')->input('name')) {{ app('request')->input('name') }} @endif">
                                                    <button type="submi" class="btn btn-primary"><i class="fa fa-filter"></i>&nbsp; Filtrar</button>
                                                </div>
                                            </form>
                                            <small class="form-text text-muted">Nombre del producto</small>
                                        </div>
                                </div>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Picture</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Category</th>
                                        <th>SubCategory</th>
                                        <th>Oferta</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td><figure class="img-table"><img src="/uploads/products/{{ $product->picture }}" alt=""></figure></td>
                                            <td>{{ $product->name }}</td>
                                            <td>${{ $product->price }}</td>
                                            <td>{{ $product->category->name }}</td>
                                            <td>{{ $product->subcategory->name }}</td>
                                            <td>@if($product->ofert) <span class="inOfert" data-tooltip="tooltip" data-placement="bottom" title="Hasta: {{ $product->ofert_date }}"><i class="fa fa-check" aria-hidden="true"></i> EN OFERTA</span> @else - @endif</td>
                                            <td>
                                                <a href="/adm/products/{{ $product->id }}/edit"><i class="fa fa-pencil edit" aria-hidden="true"></i></a>
                                                <a href="/adm/products/{{ $product->id }}/delete" onclick="return deleteConfirm()"><i class="fa fa-close delete" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $products->links() }}
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