<div class="modal fade" id="citaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 90%">
      <div class="modal-content">
        <div class="modal-header py-1 bg-primary">
          <h5 class="modal-title" id="labelTitleModalCita"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="citaForm" method="POST">
          @csrf
          <input type="hidden" name="_method" id="_methodCita" class="clear-input">
        <div class="modal-body"  style="max-height: 400px; overflow-y: auto;">
          <div class="form-group col-sm-12 col-md-4">
            <label for="verify_dui"> Agendar nueva cita al consultante ingrese el dui:</label>
            <input type="text" class="form-control clear-input" id="verify_dui" name="verify_dui" placeholder="Ingresar DUI">
          </div>
          <div class="form-row">
            <div class="form-group col-sm-12 col-md-2">
              <label for="dia">Día:</label>
              <input type="date" onchange="verifyDate(this)" readonly class="form-control" id="fecha" name="fecha" required>
            </div>
            <div class="form-group col-sm-12 col-md-2">
              <label for="hora">Hora:</label>
              <select class="form-control clear-input" name="hora" id="hora" required>
              </select>  
              
            </div>
            <div class="form-group col-sm-12 col-md-6">
              <label for="nombre">Nombre completo:</label>
              <input type="text" class="form-control clear-input" onkeyup="mayus(this)" id="paciente" name="paciente" required>
            </div>
            <div class="form-group col-sm-12 col-md-2">
              <label for="dui">Dui:</label>
              <input type="text" class="form-control clear-input" id="dui" name="dui" required>
            </div>
            <div class="form-group col-sm-12 col-md-4">
              <label for="email">Email:</label>
              <input type="text" class="form-control clear-input" id="email" name="email" required>
            </div>
            <div class="form-group col-sm-12 col-md-2">
              <label for="numero">Celular:</label>
              <input type="text" id="celular" name="celular" class="form-control clear-input" required>
            </div>
            <div class="form-group col-sm-12 col-md-6">
              <label for="numero">Terapeutas:</label>
              <div class="input-group is-invalid">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="terapeuta" onclick="openModalTerapeuta()"><i class="fas fa-plus"></i></label>
                </div>
                <select class="custom-select" name="terapeuta_id" id="terapeuta_id" required>
                </select>
              </div>
              {{-- <div class="invalid-feedback">
                Example invalid input group feedback
              </div> --}}
            </div>
            <div class="form-group col-sm-12 col-md-12 col-xl-12">
              <label for="comentario">Motivo:</label>
              <input id="motivo" name="motivo" onkeyup="mayus(this)" class="form-control clear-input">
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