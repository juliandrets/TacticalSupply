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
                        <h1>Nuevo Producto</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><a href="/adm/products">Productos</a></li>
                            <li class="active"><a href="/adm/products/create">Nuevo Producto</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12" style="padding-bottom: 20px">
                        <a href="/adm/products/"><button type="button" class="btn btn-primary"><i class="fa fa-angle-left"></i>&nbsp; Volver</button></a>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Nuevo Producto</strong>
                            </div>
                            <form action="/adm/products/{{ $model->id }}/update" method="POST"  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body card-block">
                                    <div class="form-group col-12">
                                        <label class=" form-control-label">Imagen</label>

                                        <figure class="img-producto-form">
                                            <img src="/uploads/{{ $route }}/tumb/{{ $model->picture }}" alt="">
                                        </figure>

                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-image"></i></div>
                                            <input class="form-control" type="file" name="picture" accept="image/*" style="font-size: 12px">
                                        </div>
                                        <small class="form-text text-muted">Preferentemente formato JPG</small>
                                    </div>

                                    <div class="form-group col-6">
                                        <label class=" form-control-label">Nombre</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                            <input class="form-control" type="text" name="name" value="{{ $model->name }}" placeholder="Nombre de la categoria *" required>
                                        </div>
                                        <small class="form-text text-muted">Ejemplo: Pantalones Cargo Emerson</small>
                                    </div>
                                    <div class="form-group col-3">
                                        <label class=" form-control-label">Categoria</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-tag"></i></div>
                                            <select class="form-control" name="category" id="category">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" @if($model->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <small class="form-text text-muted">Ejemplo: Pantalones Cargo Emerson</small>
                                    </div>
                                    <div class="form-group col-3">
                                        <label class=" form-control-label">Subcategoria</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-tags"></i></div>
                                            <select class="form-control" name="subcategory" id="subcategory">
                                                @foreach ($categories as $category)
                                                    <optgroup label = "{{ $category->name }}">
                                                        @foreach ($subcategories as $subcategory)
                                                            @if($category->id == $subcategory->category_id)
                                                                <option value="{{ $subcategory->id }}" @if($model->subcategory_id == $subcategory->id) selected @endif>{{ $subcategory->name }}</option>
                                                            @endif
                                                        @endforeach
                                                    </optgroup>
                                                @endforeach
                                            </select>
                                        </div>
                                        <small class="form-text text-muted">Ejemplo: Pantalones Cargo Emerson</small>
                                    </div>

                                    <div class="form-group col-3">
                                        <label class="form-control-label">Marca</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-shopping-bag"></i></div>
                                            <select class="form-control" name="brand" id="">
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}" @if($model->brand == $brand->id) selected @endif>{{ $brand->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <small class="form-text text-muted">Ejemplo: Emerson</small>
                                    </div>
                                    <div class="form-group col-3">
                                        <label class="form-control-label">Precio</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-dollar"></i></div>
                                            <input class="form-control" type="number" name="price" value="{{ $model->price }}" required>
                                        </div>
                                        <small class="form-text text-muted">Precio del producto</small>
                                    </div>
                                    <div class="form-group col-3">
                                        <label class="form-control-label">Moneda</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-dollar"></i></div>
                                            <select class="form-control" name="currency" id="">
                                                <option value="ARG" @if($model->currency == 'ARG') selected @endif>ARG</option>
                                                <option value="USD" @if($model->currency == 'USD') selected @endif>USD</option>
                                            </select>
                                        </div>
                                        <small class="form-text text-muted">ARG o USD</small>
                                    </div>
                                    <div class="form-group col-3">
                                        <label class=" form-control-label">Stock</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-recycle"></i></div>
                                            <input class="form-control" type="number" name="stock" value="{{ $model->stock }}" required>
                                        </div>
                                        <small class="form-text text-muted">Si se queda sin stock el producto deja de estar disponible</small>
                                    </div>
                                    <div class="form-group col-1">
                                        <label class=" form-control-label">Oferta</label>
                                        <div class="input-group" >
                                            <label class="switch">
                                                <input type="checkbox" name="ofert" class="ofert" @if($model->ofert) checked @endif>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group col-3" id="ofert_date" style="display: none">
                                        <label class=" form-control-label">Fecha limite</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-recycle"></i></div>
                                            <input class="form-control" type="date" id="ofert_date_input" name="ofert_date" value="{{ $model->ofert_date }}">
                                        </div>
                                        <small class="form-text text-muted">Fecha limite de la oferta</small>
                                    </div>

                                    <div class="form-group col-12" id="ofert_date">
                                        <label class=" form-control-label">Descripcion</label>
                                        <div class="input-group">
                                            <textarea class="form-control" name="description" required style="min-height: 150px">{{ $model->description }}</textarea>
                                        </div>
                                        <small class="form-text text-muted">Descripcion del producto</small>
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

    <script>
        $(document).ready(function () {
            if ($(".ofert").is(':checked')) {
                $("#ofert_date").fadeIn("slow");
                $("#ofert_date").css("display", "block");
                $("#ofert_date_input").attr('required', 'required');
            }
            $(".ofert").click(function () {
                if ($("#ofert_date").css("display") == "none") {
                    $("#ofert_date").fadeIn("slow");
                    $("#ofert_date").css("display", "block");
                    $("#ofert_date_input").attr('required', 'required');
                } else {
                    $("#ofert_date").fadeOut("slow", function() {
                        $("#ofert_date").css("display", "none");
                        $("#ofert_date_input").removeAttr('required');
                    });
                }
            });
        });
    </script>

    @include('layout/admin/validaciones')

    <script src="{{ asset('admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins.js') }}"></script>
    <script src="{{ asset('admin/js/main.js') }}"></script>





@endsection