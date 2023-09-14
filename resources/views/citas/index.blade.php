@extends('layouts.app')
@section('title','CNSM | Citas pacientes')
@section('content')
  @include('citas.modal_agendar_cita')
  @include('citas.modal_list_citas_dia')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <button class="btn btn-outline-success btn-xs">Citas diarias</button>
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
    <script>
        //Validaciones de input
        var cleave = new Cleave('#celular', {
        delimiter: '-',
        blocks: [4,4],
        });
        //Validaciones de input dui
        var cleave = new Cleave('#dui', {
        delimiter: '-',
        blocks: [8,1],
        });
    </script>
@endpush
