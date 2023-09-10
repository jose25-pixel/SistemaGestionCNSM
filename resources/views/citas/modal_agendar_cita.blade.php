<div class="modal fade" id="citaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 90%">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Programar Cita</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="citaForm" method="POST">
          @csrf
        <div class="modal-body"  style="max-height: 400px; overflow-y: auto;">
          <div class="form-row">
            <div class="form-group col-sm-12 col-md-2">
              <label for="dia">Día:</label>
              <input type="date" readonly class="form-control" id="fecha" name="fecha" required>
            </div>
            <div class="form-group col-sm-12 col-md-2">
              <label for="hora">Hora:</label>
              <input type="time" class="form-control" id="hora" name="hora" required>
            </div>
            <div class="form-group col-sm-12 col-md-6">
              <label for="nombre">Nombre completo:</label>
              <input type="text" class="form-control" onkeyup="mayus(this)" id="paciente" name="paciente" required>
            </div>
            <div class="form-group col-sm-12 col-md-2">
              <label for="dui">Dui:</label>
              <input type="text" class="form-control" id="dui" name="dui" required>
            </div>
            <div class="form-group col-sm-12 col-md-4">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group col-sm-12 col-md-2">
              <label for="numero">Celular:</label>
              <input type="text" id="celular" name="celular" class="form-control" required>
            </div>
            <div class="form-group col-sm-12 col-md-12 col-xl-12">
              <label for="comentario">Motivo:</label>
              <input id="motivo" name="motivo" class="form-control">
            </div>
          </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-success btn-sm">Registrar</button>
            </div>
        </form>
      </div>
    </div>
  </div>