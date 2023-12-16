<div class="modal fade" id="modal_selected_pacientes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 90%">
      <div class="modal-content">
        <div class="modal-header py-1  bg-primary">
          <h5 class="modal-title" id="exampleModalLabel">LISTADO CONSULTANTES</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card">
            <div class="card-header py-1">
              <h3 class="card-title">CONSULTANTES REGISTRADOS</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="dt_pacientes" class="table table-custom table-hover">
                <thead style="text-align: center">
                  <th>Código</th>
                  <th>Cliente</th>
                  <th>DUI</th>
                  <th>Teléfono</th>
                  <th>fecha cita</th>
                  <th>Agregar</th>
                </thead>
                <tbody style="font-size: 14px;text-align:center">
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
    </div>
  </div>