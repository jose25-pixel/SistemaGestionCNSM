@extends('layouts.app')
@section('title','CNSM | Citas pacientes')
@section('content')
@include('citas.modal_list_citas_dia')
@include('citas.modal_citas_all')
@include('citas.modal_agendar_cita')
@include('terapeuta.modal.modal_form_terapeuta')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <button class="btn btn-outline-success btn-xs" id="btn-citas-all">Citas</button>
                      </div>
                        <div class="card-body p-0">
                            <!-- THE CALENDAR -->
                            <div id="calendar"></div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->  
@endsection

@push('js_scripts')
    <script src="{{asset('js/cita.js')}}"></script>
    <script src="{{asset('js/terapeuta.js')}}"></script>
    <script>
    // Validaciones de input
    var celularCleave = new Cleave('#celular', {
        delimiter: '-',
        blocks: [4, 4],
    });

    var duiCleave = new Cleave('#dui', {
        delimiter: '-',
        blocks: [8, 1],
    });
    //Validaciones para terapeutas
    var duiCleave = new Cleave('#dui_t', {
        delimiter: '-',
        blocks: [8, 1],
    });
    var celularCleave = new Cleave('#telefono_t', {
        delimiter: '-',
        blocks: [4, 4],
    });
    // Función para validar números
    function validarNumeros(event) {
        var input = event.target;
        var valor = input.value;

        // Mantener solo dígitos y guiones
        valor = valor.replace(/[^\d-]/g, '');

        input.value = valor;
    }

    // Agregar evento de escucha para validar números
    document.getElementById('celular').addEventListener('input', validarNumeros);
    document.getElementById('dui').addEventListener('input', validarNumeros);
</script>


@endpush
