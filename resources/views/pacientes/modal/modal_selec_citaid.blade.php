
<!-- Modal -->
<div class="modal fade" id="citasModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 60%">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Selecciona una cita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="max-height: 550px; overflow-y: auto;">
                <div class="card">
                    <div class="card-header">
                        <div class="table-responsive">
                            <table id="citasTable" class="table table-custom table-hover">
                                <thead style="text-align: center" >
                                    <th style="min-width: 140px; scope="col">Consultante</th>
                                    <th style="min-width: 140px; scope="col">DUI</th>
                                    <th style="min-width: 140px; scope="col">Fecha</th>
                                    <th style="min-width: 140px; scope="col">Hora</th>
                                    <th style="min-width: 140px; scope="col">Acciones</th>
                                </thead>
                                <tbody style="font-size: 14px; text-align: center">
                                    <!-- Contenido de la tabla -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
