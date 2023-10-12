@extends('layouts.app')

@section('content-header')
<div class="col-sm-6">

</div><!-- /.col -->
@endsection

@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <div id="" tabindex="-1" role="" aria-labelledby="">
            <div class="" style="max-width: 100%">
                <div class="">
                    <div class=" text-center">
                        <h5 class="" id="exampleModalLabel">LISTADO GENERAL DE PACIENTES</h5>


                    </div>
                    @include('pacientes.modal.modal_agregar_info')
                    @include('pacientes.modal.modal_selec_citaid')
                    @include('pacientes.modal.modal_agregar')
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-header py-1">


                                <div style="border-top:4px solid #050859">
                                    <button class=" m-2 btn btn-outline-secondary btn-sm btn-rounded" onclick="Agregar(this)"> <i class="nav-icon fas fa-users"></i>
                                        Agregar
                                        <i class="fas fa-plus"></i></button>
                                </div>

                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="tabla-pacientes" class="table table-striped table-bordered">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Código</th>
                                                <th scope="col">DUI</th>
                                                <th scope="col">Paciente</th>
                                                <th scope="col">Fec_Nacimi</th>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    // Validaciones de input
    var celularCleave = new Cleave('#celular_dos', {
        delimiter: '-'
        , blocks: [4, 4]
    , });
    var celularCleave2 = new Cleave('#celular_tres', {
        delimiter: '-'
        , blocks: [4, 4]
    , });

    // Función para validar números
    function validarNupacientes(event) {
        var input = event.target;
        var valor = input.value;

        // Mantener solo dígitos y guiones
        valor = valor.replace(/[^\d-]/g, '');

        input.value = valor;
    }

    // Agregar evento de escucha para validar números
    document.getElementById('celular_dos').addEventListener('input', validarNupacientes);
    document.getElementById('celular_tres').addEventListener('input', validarNupacientes);

</script>
@endpush
