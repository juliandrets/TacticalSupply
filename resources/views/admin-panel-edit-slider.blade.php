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
                        <h1>Editar Portada</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><a href="/adm/sliders">Portadas</a></li>
                            <li class="active"><a href="#">Editar Portada</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12" style="padding-bottom: 20px">
                        <a href="/adm/sliders/"><button type="button" class="btn btn-primary"><i class="fa fa-angle-left"></i>&nbsp; Volver</button></a>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Editar Portada</strong>
                            </div>

                            <form action="/adm/sliders/{{$slider->id}}/update" method="POST"  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body card-block">
                                    <div class="form-group">
                                        <label class=" form-control-label">Imagen</label>

                                        <figure class="img-producto-form">
                                            <img src="/uploads/sliders/tumb/{{ $slider->picture }}" alt="">
                                        </figure>

                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-image"></i></div>
                                            <input class="form-control" type="file" name="picture" accept="image/*" style="font-size: 12px" required>
                                        </div>
                                        <small class="form-text text-muted">Preferentemente formato JPG y <b>medidas 1920x1080 pixeles</b>.</small>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Nombre (Solo adminitrador)</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                            <input class="form-control" type="text" name="name" placeholder="Nombre de la portada *" value="{{ $slider->name }}" required>
                                        </div>
                                        <small class="form-text text-muted">Nombre de la portada, solo visible para el administrador</small>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Titulo</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                            <input class="form-control" type="text" name="title" placeholder="Titulo de la portada *" value="{{ $slider->title }}" required MAXLENGTH="28">
                                        </div>
                                        <small class="form-text text-muted">Ejemplo: Nueva temporada 2018 Pantalones</small>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Subtitulo</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                            <input class="form-control" type="text" name="subtitle" placeholder="Subtitulo de la portada" value="{{ $slider->subtitle }}" MAXLENGTH="30">
                                        </div>
                                        <small class="form-text text-muted">Ejemplo: Subtitulo de la portada</small>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Link</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-external-link-square"></i></div>
                                            <input class="form-control" type="text" name="link" placeholder="Link destino de la portada"value="{{ $slider->link }}" required>
                                        </div>
                                        <small class="form-text text-muted">Link al hacer click a la portada (Si esta vacio el boton "ver mas" no aparece)</small>
                                    </div>
                                    <div class="form-group">
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

