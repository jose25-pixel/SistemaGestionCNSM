<div class="modal fade" id="modal_paciente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog moda-sm modal-md modal-lg">
      <div class="modal-content">
        <div class="modal-header py-1 bg-primary">
          <h5 class="modal-title" id="labelTitleModalpaciente"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="" method="POST">
          @csrf
          <input type="hidden" name="_method" id="_methodpaciente" class="clear-input">
        <div class="modal-body"  style="max-height: 400px; overflow-y: auto;">
          <div class="form-row">
            <div class="form-group col-sm-12 col-md-8">
              <label for="dia">Nombre</label>
              <input type="text" onkeyup="mayus(this)" class="form-control" id="paciente" name="paciente" required>
            </div>
            <div class="form-group col-sm-12 col-md-4">
                <label for="dui">DUI*:</label>
                <input type="text" onkeyup="validarNumeros(this)" class="form-control clear-input" id="dui" name="dui_t" required>
              </div>
              <div class="form-group col-sm-12 col-md-4">
                <label for="telefono_t">Teléfono*:</label>
                <input type="text" onkeyup="validarNumeros(this)" class="form-control clear-input" id="celular" name="celular" required>
              </div>
    
            <div class="form-group col-sm-12 col-md-12">
                <label for="direccion_t">motivo:</label>
                <input type="text" class="form-control clear-input" id="motivo" name="motivo">
              </div>
          </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-success btn-sm"><i class="fas fa-save"></i><span id="btnpaciente"></span></button>
            </div>
        </form>
      </div>
    </div>
  </div>