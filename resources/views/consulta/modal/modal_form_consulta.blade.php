<style>
  /* Estilo de la tabla */
  table {
    width: 100%;
    border-collapse: collapse;
    font-family: Helvetica, sans-serif;
  }
  
  /* Estilo de las celdas de encabezado */
  th {
    background-color: #333;
    color: white;
    font-weight: bold;
    font-size: 14px;
    text-align: center;
    padding: 4px !important;
  }
  
  /* Estilo de las celdas de datos */
  td {
    border: 1px solid #ddd;
    padding: 6px !important;
    font-size: 14px;
  }
  
  /* Cambiar el color de fondo de cada fila alternativa */
  tr:nth-child(even) {
    background-color: #f1f1f1;
  }

</style>
<div class="modal fade modal-static" id="modalConsulta" tabindex="-1" role="dialog" data-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%">
      <div class="modal-content">
        <div class="modal-header py-1 bg-primary">
          <h5 class="modal-title" id="labelTitleConsult"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="consultaForm" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="_method" id="_methodConsult" class="clear-input">
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12 col-md-10">
              <div class="form-row">
                <div class="form-group col-sm-12 col-md-2">
                    <label for="numero">Cod.clinico:</label>
                    <div class="input-group is-invalid">
                      <div class="input-group-prepend">
                        <label class="input-group-text" style="cursor: pointer" for="cod_clinico" id="btnAddPaci"><i style="cursor: pointer" class="fas fa-plus"></i></label>
                      </div>
                      <input class="form-control cls-input" type="text" name="cod_clinico" id="cod_clinico" readonly required>
                    </div>
                  </div>
                  <div class="form-group col-sm-12 col-md-4">
                    <label for="paciente">Cliente:</label>
                    <input type="text" class="form-control cls-input oblig-input" readonly id="paciente" name="paciente" required>
                  </div>
                  <div class="form-group col-sm-12 col-md-3">
                    <label for="dui">Dui:</label>
                    <input type="text" class="form-control cls-input oblig-input" readonly id="dui" name="dui" required>
                  </div>
                  <div class="form-group col-sm-12 col-md-3">
                    <label for="nombre">Teléfono:</label>
                    <input type="text" class="form-control cls-input" readonly id="telefono" name="telefono" required>
                  </div>
                
                <div class="form-group col-sm-12 col-md-6">
                  <label for="consulta">Motivo de consulta:</label>
                  <input type="text" class="form-control cls-input oblig-input" id="consulta" name="consulta" required>
                </div>
                <div class="form-group col-sm-12 col-md-6 col-xl-6">
                    <label for="diagnostico">Aprox. diagnóstico:</label>
                    <input type="text" id="diagnostico" name="diagnostico" class="form-control cls-input oblig-input">
                  </div>
                  <div class="card p-1 m-1 col-sm-12 col-md-12">
                    <div class="card-header p-1">
                      <span style="text-align: center">Agregar sintomas</span>
                      <div class="row form-main-sintomas">
                        <div class="form-group col-sm-12 col-md-6 col-xl-4">
                          <label for="sintomas">Sintomas:</label>
                          <input id="sintomas" name="sintomas" class="form-control cls-sintomas" type="text">
                        </div>
                        <div class="form-group col-sm-12 col-md-6 col-xl-4">
                          <label for="conflictos">Conflictos:</label>
                          <input id="conflictos" name="conflictos" class="form-control cls-sintomas" type="text">
                        </div>
                        <div class="form-group col-sm-12 col-md-6 col-xl-4">
                          <label for="situacion">Situación actual:</label>
                          <textarea id="situacion" name="situacion" class="form-control cls-sintomas" type="text"></textarea>
                        </div>
                      </div>
                      <div class="d-flex justify-content-end">
                        <button type="button" title="Añadir sintoma" class="btn btn-outline-success btn-sm add-sintoma"><i class="fas fa-plus"></i></button>
                      </div>
                    </div>
                    <div class="card-body p-1 m-1">
                      <table class="table table-striped" style="height: 10px">
                        <thead>
                          <tr>
                            <th style="width:5%">#</th>
                            <th style="width:25%">SINTOMAS</th>
                            <th style="width:25%">CONFLICTOS</th>
                            <th style="width:35%">SITUACIÓN ACTUAL</th>
                            <th style="width:10%">Eliminar</th>
                          </tr>
                        </thead>
                        <tbody id="sintomas-rows">
                        </tbody>
                      </table>
                    </div>
                  </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-2">
              <div class="form-group col-sm-12 col-md-12 col-xl-12">
                <label for="genograma">Genograma:</label>
                <input id="genograma" name="genograma" type="file" accept="image/png,image/jpeg" class="form-control clear-input">
              </div>
              <img id="imagenSeleccionada" alt="genograma de consulta" width="180">
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