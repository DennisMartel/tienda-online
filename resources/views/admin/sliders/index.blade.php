@extends('layouts.admin')

@section('title', 'Carouseles')

@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Administración Carouseles</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Administración Carouseles</li>
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
                    Administración Carouseles
                </div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success ml-sm-auto" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-plus-circle"></i>
                    Agregar Carousel
                </button>
  
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('sliders.store') }}" method="post" id="form-add" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Crear Carousel</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" name="nombre" id="nombre" class="form-control">
                                        <span class="text-danger error-text nombre_error"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Descripción</label>
                                        <textarea class="form-control" name="descripcion" id="descripcion" rows="2"></textarea>
                                        <span class="text-danger error-text descripcion_error"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="imagen">Imagen</label>
                                        <input type="file" name="imagen" id="imagen" class="form-control">
                                        <span class="text-danger error-text imagen_error"></span>
                                    </div>
                                    <div class="form-group">
                                        <div class="img-holder"></div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" id="btn-save" class="btn btn-success">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control search" placeholder="Buscar...">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id=""><i class="fas fa-search"></i></span>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Status</th>
                                <th>Creado</th>
                                <th>Actualizado</th>
                                <th>Miniatura</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="all-data">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer" id="pagination-links">

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
                    $('.img-holder').empty();
                    $('.modal').modal('hide');
                    getSliders(1);
                    toastr.success(data.msg);
                }
            }
        });
    });

    /// MUESTRA LA IMAGEN A SUBIR
    $('input[type="file"][name="imagen"]').val();
    $('input[type="file"][name="imagen"]').on('change', function() {
        var img_path = $(this)[0].value;
        var img_holder = $('.img-holder');
        var extension = img_path.substring(img_path.lastIndexOf('.') + 1).toLowerCase();

        if (extension == 'jpeg' || extension == 'jpg' || extension == 'png' || extension == "webp") {
            if (typeof(FileReader) != 'undefined') {
                img_holder.empty();
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('<img/>', { 'src': e.target.result, 'class': 'img-fluid', 'style': 'max-width:100px; margin-bottom:10px;' }).appendTo(img_holder);
                }
                img_holder.show();
                reader.readAsDataURL($(this)[0].files[0]);
            } else {
                $(img_holder).html('Este navagador no soporta la extension FileReader');
            }
        } else {
            $(img_holder).empty();
        }
    });

    /// OBTIENE TODOS LOS REGISTROS
    function getSliders(page) {
        $.get('/getSliders', {}, function(data) {
            $('#all-data').html(data.result);
            $('#pagination-links').html(data.links);
        }, 'json');
    }
    getSliders(1);

    /// OBTIENE LOS REGISTROS BUSCADOS
    $(document).on('keyup', '.search', function() {
        if ($(this).val().length > 0) {
            var search = $(this).val();
            $.get('/getSliders', { search: search }, function(data) {
                $('#all-data').html(data.result);
                $('#pagination-links').html(data.links)
            }, 'json');
            return;
        }
        getSliders(1);
    });

    /// OBTIENE LOS REGISTROS PAGINADOS
    $(document).on('click', '.page-link', function(event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        paginarDepartamentos(page);
    });

    function paginarDepartamentos(page) {
        var search = $('.search').val();
        $.get('/getSliders', { page: page, search: search }, function(data) {
            $('#all-data').html(data.result);
            $('#pagination-links').html(data.links);
        }, 'json');
    }
    /// =================

    /// ELIMINA UN REGISTRO
    $(document).on('click', '.deleteBtn', function() {
        var slider_id = $(this).data('id');
        var name = $(this).data('name');
        Swal.fire({
            title: 'Alerta',
            text: `Estás seguro de borrar el registro ${name}`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, Borrarlo!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "/deleteSlider",
                    method: "POST",
                    data: { slider_id: slider_id },
                    dataType: 'json',
                    success: function(data) {
                        if (data.code == 1) {
                            getSliders(1);
                            toastr.success(data.msg);
                        } else {
                            toastr.error(data.msg);
                        }
                    }
                });
            }
        })
    });
});
</script>
@endsection
@endsection