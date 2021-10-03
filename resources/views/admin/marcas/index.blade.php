@extends('layouts.admin')

@section('title', 'Marcas')

@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Administración Marcas</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Administración Marcas</li>
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
                    Administración Marcas
                </div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success ml-sm-auto" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-plus-circle"></i>
                    Agregar Departamento
                </button>
  
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
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
                            @for($i = 0; $i < 10; $i++)
                                <tr>
                                    <td>Moda</td>
                                    <td><span class="badge badge-success">ACTIVO</span></td>
                                    <td>2021-10-02</td>
                                    <td>2021-10-02</td>
                                    <td><img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="" width="50"></td>
                                    <td>
                                        <div class="d-flex">
                                            <button type="button" class="btn btn-primary mr-2" data-id=""><i class="far fa-eye"></i></button>
                                            <button type="button" class="btn btn-warning mr-2" data-id=""><i class="far fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger mr-2" data-id=""><i class="far fa-trash-alt"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')

@endsection
@endsection