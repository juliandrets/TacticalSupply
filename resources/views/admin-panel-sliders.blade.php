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
                        <h1>Portadas</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><a href="/adm/sliders">Portadas</a></li>
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
                                    La portada fue creada exitosamente.
                                @elseif($event == 'update')
                                    La portada fue editada exitosamente.
                                @elseif($event == 'delete')
                                    La portada fue borrada exitosamente.
                                @endif
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    <div class="col-md-12" style="padding-bottom: 20px">
                        <a href="/adm/sliders/create"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Nueva Portada</button></a>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Portadas</strong>
                            </div>
                            <div class="card-body">
                                <ul id="sliders">
                                    @foreach($sliders as $slider)
                                        <li>
                                            <figure><img src="/uploads/sliders/tumb/{{ $slider->picture }}" alt=""></figure>
                                            <section>
                                                <h2>{{ $slider->name }}</h2>
                                            </section>
                                            <ul>
                                                <li><a href="/adm/sliders/{{ $slider->id }}/edit"><i class="fa fa-pencil edit" aria-hidden="true"></i></a></li>
                                                <li><a href="/adm/sliders/{{ $slider->id }}/delete" onclick="return deleteConfirm()"><i class="fa fa-close delete" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                                {{ $sliders->links() }}
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