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


    <div class="modal fade" id="citaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Programar Cita</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body"  style="max-height: 400px; overflow-y: auto;">
              <form id="citaForm">
                <div class="form-group">
                  <label for="dia">Día:</label>
                  <input type="date" class="form-control" id="fecha" name="dia" required>
                </div>
                <div class="form-group">
                  <label for="hora">Hora:</label>
                  <input type="time" class="form-control" id="hora" name="hora" required>
                </div>
                <div class="form-group">
                  <label for="nombre">Nombre y apellido:</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="dui">Dui:</label>
                    <input type="text" class="form-control" id="dui" name="dui" required>
                  </div>
 
                
                  <div class="form-group">
                    <label for="numero">Celular:</label>
                    <input type="text" id="numero" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="comentario">Motivo:</label>
                    <textarea id="comentario" class="form-control" rows="4"></textarea>
                  </div>
                
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" id="guardarCita">Guardar Cita</button>
            </div>
          </div>
        </div>
      </div>
      

    
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
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
                // Se ejecutará cuando un usuario haga clic en cualquier día del calendario
                var dateClicked = info.date;
                console.log('hola')
                            var formattedDate = moment(dateClicked).format('YYYY-MM-DD');
                            $('#fecha').val(formattedDate); // Llena el campo de fecha con el dia selecionado automaticamente
                // Por ejemplo, puedes mostrar un modal de Bootstrap
                $('#citaModal').modal('show');
        

      },
            });

            calendar.render();
        });

        document.addEventListener('DOMContentLoaded', function () {
        // Obtén una referencia al formulario y al botón "Guardar Cita"
        const citaForm = document.getElementById('citaForm');
        const guardarCitaButton = document.getElementById('guardarCita');

        // Agrega un evento al botón "Guardar Cita" para enviar datos cuando se hace clic
        guardarCitaButton.addEventListener('click', function () {
          // Obtén los valores de los campos del formulario
          const dia = document.getElementById('fecha').value;
          const hora = document.getElementById('hora').value;
          const nombre = document.getElementById('nombre').value;
          const email = document.getElementById('email').value;
          const dui = document.getElementById('dui').value;
          const numero = document.getElementById('numero').value;
          const comentario = document.getElementById('comentario').value;

            // Validación del número de identificación
          const regexDUI = /^\d{8}-\d{1}$/;

            if (!regexDUI.test(dui)) {
                alert('El número de DUI no sigue el formato correcto (12345678-9).');
                return; // Detiene el envío del formulario si el formato es incorrecto
            }
            // Validación del número de telefono
            const numerod = /^\d{4}-\d{4}$/;

            if (!numerod.test(numero)) {
                alert('El número de telefono no sigue el formato correcto (1234-1234).');
                return; // Detiene el envío del formulario si el formato es incorrecto
            }

            // Crea un objeto con los datos a enviar
            const datos = {
              paciente: nombre,
              dui: dui,
              celular: numero,
              fecha: dia,
              hora: hora,
              email: email,     
              motivo: comentario,
            };
            console.log(datos);
          
            // Envía los datos al servidor utilizando Axios
            axios
              .post('/citas/guardar', datos)
              
              .then(response => {
                console.log(datos);
                // Lógica después de guardar la cita (por ejemplo, cerrar el modal)
                $('#citaModal').modal('hide');
                // Restablece los campos del formulario después de guardar la cita
                citaForm.reset();
                console.log(response.data.mensaje);
              })
              .catch(error => {
                // Maneja los errores si los hay
                console.error(error);
              });
  });
  $('#citaModal').on('hidden.bs.modal', function () {
            // Restablece los campos del formulario al cerrar el modal
            citaForm.reset();
        });
});
</script>

      
@endsection
