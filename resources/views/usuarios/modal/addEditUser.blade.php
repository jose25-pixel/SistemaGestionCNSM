<div class="modal fade" id="modalUser" tabindex="-1" role="dialog" data-keyboard="false">
    <div class="modal-dialog" style="max-width: 90%">
        <div class="modal-content modal-dialog-scrollable">
            <div class="modal-header py-1 bg-primary">
                <h5 class="modal-title" id="labelTitleConsult"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formUser" method="POST">
                @csrf
                <input type="hidden" name="_method" id="_methodConsult" class="clear-input">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-sm-12 col-md-2">
                            <label for="categoria">Categoria:</label>
                            <select class="form-control" id="categoria" name="categoria">
                                <option value="Admin">Administrador</option>
                                <option value="Terapeuta">Terapeuta</option>
                                <option value="Recepcionista">Recepcionista</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-12 col-md-2">
                            <label for="cod">Codigo:</label>
                            <input type="text" class="form-control cls-input oblig-input" id="cod" name="cod">
                        </div>
                        <div class="form-group col-sm-12 col-md-4">
                            <label for="nombre">Nombre*:</label>
                            <input type="text" class="form-control cls-input oblig-input" id="nombre" name="nombre"
                                required>
                        </div>
                        <div class="form-group col-sm-12 col-md-4">
                            <label for="direccion">Dirección:</label>
                            <input type="text" class="form-control cls-input oblig-input" id="direccion"
                                name="direccion">
                        </div>
                        <div class="form-group col-sm-12 col-md-2">
                            <label for="dui">Dui:</label>
                            <input type="text" class="form-control cls-input oblig-input" id="dui" name="dui">
                        </div>
                        <div class="form-group col-sm-12 col-md-2">
                            <label for="nombre">Teléfono*:</label>
                            <input type="text" class="form-control cls-input" id="telefono" name="telefono" required>
                        </div>
                        <div class="form-group col-sm-12 col-md-3">
                            <label for="email">Correo:</label>
                            <input type="text" class="form-control cls-input" id="email" name="email">
                        </div>
                        <div class="form-group col-sm-12 col-md-2">
                            <label for="usuario">Usuario*:</label>
                            <input type="text" class="form-control cls-input" id="usuario" name="usuario" required>
                        </div>
                        <div class="form-group col-sm-12 col-md-3">
                            <label for="password">Contraseña*:</label>
                            <input type="password" class="form-control cls-input" id="password" name="password">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-success btn-sm"><i class="fas fa-save"></i><span
                            id="btnLabelUser"></span></button>
                </div>
            </form>
        </div>
    </div>
</div>