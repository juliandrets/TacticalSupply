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
                        <h1>Categorias</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><a href="/adm/categories">Categorias</a></li>
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
                                    La categoria fue creada exitosamente.
                                @elseif($event == 'edit')
                                    La categoria fue editada exitosamente.
                                @elseif($event == 'delete')
                                    La categoria fue borrada exitosamente.
                                @elseif($event == 'create-sub')
                                    La subcategoria fue creada exitosamente.
                                @elseif($event == 'edit-sub')
                                    La subcategoria fue editada exitosamente.
                                @elseif($event == 'delete-sub')
                                    La subcategoria fue borrada exitosamente.
                                @endif
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    <div class="col-md-12" style="padding-bottom: 20px">
                        <a href="/adm/categories/create"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Nueva Categoria</button></a>
                        <a href="/adm/subcategories/create"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Nueva SubCategoria</button></a>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Categorias</strong>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Picture</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td><figure class="img-table"><img src="/uploads/categories/{{ $category->picture }}" alt=""></figure></td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>
                                                <a href="/adm/categories/{{ $category->id }}/edit"><i class="fa fa-pencil edit" aria-hidden="true"></i></a>
                                                <a href="/adm/categories/{{ $category->id }}/delete" onclick="return deleteConfirm()"><i class="fa fa-close delete" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Sub Categorias</strong>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Picture</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($subCategories as $subcategory)
                                        <tr>
                                            <td><figure class="img-table"><img src="/uploads/categories/{{ $subcategory->category->picture }}" alt=""></figure></td>
                                            <td>{{ $subcategory->name }}</td>
                                            <td>{{ $subcategory->category->name }}</td>
                                            <td>
                                                <a href="/adm/subcategories/{{ $subcategory->id }}/edit"><i class="fa fa-pencil edit" aria-hidden="true"></i></a>
                                                <a href="/adm/subcategories/{{ $subcategory->id }}/delete" onclick="return deleteConfirm()"><i class="fa fa-close delete" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();
        } );
    </script>

    @include('layout/admin/validaciones')


@endsection