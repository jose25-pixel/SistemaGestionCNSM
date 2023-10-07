@extends('layouts.app')
@include('pacientes.modal.modal_agregar_info')
@include('pacientes.modal.modal_agregar')
@section('content-header')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
        </ol>
    </div><!-- /.col -->
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div id="" tabindex="-1" role="" aria-labelledby="">
                <div class="" style="max-width: 100%">
                    <div class="">
                        <div class="">
                            <h5 class="" id="exampleModalLabel">LISTADO GENERAl de pacientes</h5>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-header py-1">

                                    <button type="button" class="btn btn-primary" onclick="Agregar(this)">AGREGAR <i
                                            class="fas fa-plus"></i></button>

                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="tabla-pacientes" class="table table-striped table-bordered">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Código</th>
                                                    <th scope="col">DUI</th>
                                                    <th scope="col">Paciente</th>
                                                    <th scope="col">Fecha de Nacimiento</th>
                                                    <th scope="col">Celular</th>
                                                    <th scope="col">Género</th>
                                                    <th scope="col">Ocupación</th>
                                                    <th scope="col">Fecha</th>
                                                    <th scope="col">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('js_scripts')
    <script src="{{ asset('js/paciente.js') }}"></script>
@endpush
