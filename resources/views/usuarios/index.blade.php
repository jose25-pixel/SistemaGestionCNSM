@extends('layouts.app')
@section('title','CNSM | Usuario')
@section('content-header')
    <span><i class="fas fa-users"></i> GESTIONAR USUARIOS</span>
@endsection
@section('content')
@include('usuarios.modal.addEditUser')
    <div class="card p-1 m-1">
        <div class="card-header" style="border-top:4px solid #050859">
            <button title="Registrar nueva consulta" class="btn btn-outline-secondary btn-sm btn-rounded" id="btnNewConsult"><i class="fas fa-user-edit"></i> Nuevo usuario</button>
        </div>
        <div class="card-body">
            <table id="dt_users_lists" class="table table-custom table-hover">
                <thead style="text-align: center;height:12px">
                  <th>#</th>
                  <th>Codigo</th>
                  <th>Nombre</th>
                  <th>DUI</th>
                  <th>Telefono</th>
                  <th>Correo</th>
                  <th>Categoria</th>
                  <th>Acciones</th>
                </thead>
                <tbody style="font-size: 14px;text-align:center">
                </tbody>
              </table>
        </div>
    </div>
@endsection

@push('js_scripts')
    <script src="{{asset('js/usuarios.js')}}"></script>
    <script src="{{asset('js/cleave/Cleave.js')}}"></script>
    <script>
    // Validaciones de input
    var celularCleave = new Cleave('.tel_user', {
        delimiter: '-',
        blocks: [4, 4],
    });

    var duiCleave = new Cleave('.dui_user', {
        delimiter: '-',
        blocks: [8, 1],
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
