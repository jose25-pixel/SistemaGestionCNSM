@extends('layouts.app')
@section('title','CNSM | Consulta')
@section('content')
@include('consulta.modal.modal_form_consulta')
@include('consulta.modal.modal_pacientes_selected')
    <span>GESTIONAR CONSULTAS</span>
    <div class="card p-1 m-1">
        <div class="card-header" style="border-top:4px solid #050859">
            <button class="btn btn-outline-secondary btn-sm btn-rounded" id="btnNewConsult"><i class="fas fa-user-edit"></i> Nueva consulta</button>
        </div>
        <div class="card-body">
            <table id="dt_listado_general_consulta" class="table table-custom table-hover">
                <thead style="text-align: center;height:12px">
                  <th>#</th>
                  <th>N° Clinico</th>
                  <th>DUI</th>
                  <th>Paciente</th>
                  <th>Fecha</th>
                  <th>Hora</th>
                  <th>Motivo de consulta</th>
                  <th>Acciones</th>
                </thead>
                <tbody style="font-size: 14px;text-align:center">
                </tbody>
              </table>
        </div>
    </div>
@endsection

@push('js_scripts')
    <script src="{{asset('js/consulta.js')}}"></script>
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
