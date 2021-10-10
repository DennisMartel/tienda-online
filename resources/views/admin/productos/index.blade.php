@extends('layouts.admin')

@section('title', 'Productos')

@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Administración Productos</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Administración Productos</li>
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
                    Administración Productos
                </div>
                
                <a href="{{ route('productos.create') }}" class="btn btn-success ml-sm-auto">Agregar Producto</a>

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
    /// OBTIENE TODOS LOS REGISTROS
    function getSliders(page) {
        $.get('/getProductos', {}, function(data) {
            $('#all-data').html(data.result);
            $('#pagination-links').html(data.links);
        }, 'json');
    }
    getSliders(1);

    /// OBTIENE LOS REGISTROS BUSCADOS
    $(document).on('keyup', '.search', function() {
        if ($(this).val().length > 0) {
            var search = $(this).val();
            $.get('/getProductos', { search: search }, function(data) {
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
        $.get('/getProductos', { page: page, search: search }, function(data) {
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
                    url: "/deleteProducto",
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