@extends('layouts.admin')

@section('title', 'Productos')

@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Registrar Producto</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('productos.index') }}">Administración Productos</a></li>
                    <li class="breadcrumb-item active">Registrar Producto</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>    
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-light d-flex flex-wrap justify-content-between align-items-center">
                <div class="card-title">
                    <i class="fas fa-table mr-2"></i>
                    Registrar Productos
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('productos.store') }}" id="form-add" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="codigo">Código de Producto</label>
                                <input type="text" name="codigo" id="codigo" class="form-control">
                                <span class="text-danger error-text codigo_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre de Producto</label>
                                <textarea name="nombre" id="nombre" rows="3" class="form-control"></textarea>
                                <span class="text-danger error-text nombre_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="precio_venta">Precio de Venta</label>
                                <input type="number" name="precio_venta" id="precio_venta" class="form-control">
                                <span class="text-danger error-text precio_venta_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <input type="number" name="stock" id="stock" class="form-control">
                                <span class="text-danger error-text stock_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="descripcion_corta">Descripción Corta</label>
                                <textarea name="descripcion_corta" id="descripcion_corta" rows="3" class="form-control"></textarea>
                                <span class="text-danger error-text descripcion_corta_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="descripcion_larga">Descripción Larga</label>
                                <textarea name="descripcion_larga" id="descripcion_larga" rows="3" class="form-control"></textarea>
                                <span class="text-danger error-text descripcion_larga_error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="departamento_id">Departamento</label>
                                <select name="departamento_id" id="departamento_id" class="form-control">
                                    <option value="">-- Selecciona un departamento --</option>
                                    @foreach ($departamentos as $item)
                                        <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger error-text departamento_id_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="categoria_id">Categoria</label>
                                <select name="categoria_id" id="categoria_id" class="form-control">
                                    <option value="">-- Selecciona una categoria --</option>
                                    @foreach ($categorias as $item)
                                        <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger error-text categoria_id_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="subcategoria_id">Subcategoria</label>
                                <select name="subcategoria_id" id="subcategoria_id" class="form-control">
                                    <option value="">-- Selecciona una subcategoria --</option>
                                    @foreach ($subcategorias as $item)
                                        <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger error-text subcategoria_id_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="marca_id">Marca</label>
                                <select name="marca_id" id="marca_id" class="form-control">
                                    <option value="">-- Selecciona una marca --</option>
                                    @foreach ($marcas as $item)
                                        <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger error-text marca_id_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="imagenes">Imagenes del Producto</label>
                                <input type="file" name="imagenes[]" id="imagenes" multiple class="form-control">
                                <span class="text-danger error-text imagenes_error"></span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="btn-save" class="btn btn-success">Registrar Producto</button>
                </form>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    $(document).ready(function() {
    /// AÑADE UN NUEVO REGISTRO
    $('#form-add').on('submit', function(e) {
        e.preventDefault();
        var form = this;
        $.ajax({
            url: $(form).attr('action'),
            method: $(form).attr('method'),
            data: new FormData(form),
            processData: false,
            dataType: 'json',
            contentType: false,
            beforeSend: function() {
                $(form).find('span.error-text').text('');
                $('#btn-save').text('Procesando datos por favor espere...')
            },
            success: function(data) {
                if (data.code == 0) {
                    $('#btn-save').text('Guardar')
                    $.each(data.error, function(prefix, val) {
                        $(form).find('span.'+prefix+'_error').text(val[0]);
                    });
                } else {
                    $(form)[0].reset();
                    $('#btn-save').text('Guardar')
                    toastr.success(data.msg);
                }
            }
        });
    });
});
</script>
@endsection
@endsection