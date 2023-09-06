@extends('layouts.app')
@section('content')
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

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'es',
                themeSystem: 'bootstrap',
                events: [
                    {
                        title: 'Cita: 3',
                        start: '2023-09-01',
                        backgroundColor: '#f56954', //red
                        borderColor: '#f56954', //red
                        allDay: true
                    }
                ],
                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar !!!
                eventDrop: function (info) {
                    // Handle event drop here
                },
                dateClick: function (info) {
                    // Maneja el clic en un día
                  console.log('Abrir modal')
                   //$('#dayModal').modal('show'); // Abre el modal
                }
            });

            calendar.render();
        });
    </script>
@endsection
