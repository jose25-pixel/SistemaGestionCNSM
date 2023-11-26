<div class="modal fade" id="modal_terapeuta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog moda-sm modal-md modal-lg">
      <div class="modal-content">
        <div class="modal-header py-1 bg-primary">
          <h5 class="modal-title" id="labelTitleTerapeuta"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="citaTerapeuta" method="POST">
          @csrf
          <input type="hidden" name="_method" id="_methodCita" class="clear-input">
        <div class="modal-body"  style="max-height: 400px; overflow-y: auto;">
          <div class="form-row">
            <div class="form-group col-sm-12 col-md-8">
              <label for="dia">Nombre (Terapeuta)*:</label>
              <input type="text" onkeyup="mayus(this)" class="form-control" id="terapeuta" name="terapeuta" required>
            </div>
            <div class="form-group col-sm-12 col-md-4">
                <label for="dui_t">DUI*:</label>
                <input type="text" onkeyup="validarNumeros(this)" class="form-control clear-input" id="dui_t" name="dui_t" required>
              </div>
              <div class="form-group col-sm-12 col-md-4">
                <label for="telefono_t">Teléfono*:</label>
                <input type="text" onkeyup="validarNumeros(this)" class="form-control clear-input" id="telefono_t" name="telefono_t" required>
              </div>
            <div class="form-group col-sm-12 col-md-4">
              <label for="email_t">Email:</label>
              <input type="text" class="form-control clear-input" id="email_t" name="email_t">
            </div>
            <div class="form-group col-sm-12 col-md-4">
                <label for="direccion_t">JVPP:</label>
                <input type="number" step="1" class="form-control clear-input cod_terapeutacita" id="codigo_t" name="codigo_t">
              </div>
          </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-success btn-sm"><i class="fas fa-save"></i><span id="btnLabelT"></span></button>
            </div>
        </form>
      </div>
    </div>
  </div>