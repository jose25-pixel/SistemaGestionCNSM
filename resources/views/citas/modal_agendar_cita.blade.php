<div class="modal fade" id="citaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
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
            <div class="form-group">
              <label for="dia">Día:</label>
              <input type="date" class="form-control" id="fecha" name="fecha" required>
            </div>
            <div class="form-group">
              <label for="hora">Hora:</label>
              <input type="time" class="form-control" id="hora" name="hora" required>
            </div>
            <div class="form-group">
              <label for="nombre">Nombre y apellido:</label>
              <input type="text" class="form-control" id="paciente" name="paciente" required>
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
                <input type="text" id="celular" name="celular" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="comentario">Motivo:</label>
                <textarea id="motivo" name="motivo" class="form-control" rows="4"></textarea>
              </div>
            
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-success btn-sm">Registrar</button>
            </div>
        </form>
      </div>
    </div>
  </div>