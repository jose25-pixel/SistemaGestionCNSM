<div class="modal fade" id="modalConsulta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 90%">
      <div class="modal-content">
        <div class="modal-header py-1 bg-primary">
          <h5 class="modal-title" id="labelTitleConsult"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="citaForm" method="POST">
          @csrf
          <input type="hidden" name="_method" id="_methodCita" class="clear-input">
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12 col-md-10">
              <div class="form-row">
                <div class="form-group col-sm-12 col-md-6">
                    <label for="numero">Paciente:</label>
                    <div class="input-group is-invalid">
                      <div class="input-group-prepend">
                        <label class="input-group-text" style="cursor: pointer" for="paciente" id="btnAddPaci"><i style="cursor: pointer" class="fas fa-plus"></i></label>
                      </div>
                      <input class="form-control" type="text" name="paciente" id="paciente" readonly required>
                    </div>
                  </div>
                  <div class="form-group col-sm-12 col-md-3">
                    <label for="dui">Dui:</label>
                    <input type="text" class="form-control clear-input" readonly id="dui" name="dui" required>
                  </div>
                  <div class="form-group col-sm-12 col-md-3">
                    <label for="nombre">Teléfono:</label>
                    <input type="text" class="form-control clear-input" readonly id="telefono" name="telefono" required>
                  </div>
                
                <div class="form-group col-sm-12 col-md-6">
                  <label for="email">Motivo de consulta:</label>
                  <input type="text" class="form-control clear-input" id="consulta" name="consulta" required>
                </div>
                <div class="form-group col-sm-12 col-md-6 col-xl-6">
                    <label for="diagnostico">Aprox. diagnóstico:</label>
                    <input id="diagnostico" name="diagnostico" class="form-control clear-input">
                  </div>
                  <div class="form-group col-sm-12 col-md-6 col-xl-6">
                    <label for="sintomas">Sintomas:</label>
                    <input id="sintomas" name="sintomas" class="form-control clear-input">
                  </div>
                  <div class="form-group col-sm-12 col-md-6 col-xl-6">
                    <label for="conflictos">Conflictos:</label>
                    <input id="conflictos" name="conflictos" class="form-control clear-input">
                  </div>
                  <div class="form-group col-sm-12 col-md-6 col-xl-6">
                    <label for="situacion">Situación:</label>
                    <input id="situacion" name="situacion" class="form-control clear-input">
                  </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-2">
              <div class="form-group col-sm-12 col-md-12 col-xl-12">
                <label for="genograma">Genograma:</label>
                <input id="genograma" name="genograma" type="file" accept="image/png,image/jpeg" class="form-control clear-input">
              </div>
              <img id="imagenSeleccionada" alt="genograma de consulta" width="100%">
            </div>
          </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-success btn-sm"><i class="fas fa-save"></i><span id="btnLabelCita"></span></button>
            </div>
        </form>
      </div>
    </div>
  </div>