<!-- Modal para ingresar datos de nueva cita -->
<div class="modal fade" id="modalNuevaCita" tabindex="-1" aria-labelledby="modalNuevaCitaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalNuevaCitaLabel">Nueva Cita</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Campos del formulario para la nueva cita -->
          <div class="form-group">
            <label for="codPaciente">Código de Paciente:</label>
            <input type="text" class="form-control" id="codPaciente" name="cod_paciente">
          </div>
          <div class="form-group">
            <label for="fechaNacimiento">Fecha de Nacimiento:</label>
            <input type="date" class="form-control" id="fechaNacimiento" name="fecha_naci">
          </div>
          <div class="form-group">
            <label for="genero">Género:</label>
            <select class="form-control" id="genero" name="genero">
              <option value="masculino">Masculino</option>
              <option value="femenino">Femenino</option>
              <!-- Otras opciones de género si es necesario -->
            </select>
          </div>
          <div class="form-group">
            <label for="ocupacion">Ocupación:</label>
            <input type="text" class="form-control" id="ocupacion" name="ocupacion">
          </div>
          <div class="form-group">
            <label for="lugarEstudio">Lugar de Estudio:</label>
            <input type="text" class="form-control" id="lugarEstudio" name="lugar_estudio">
          </div>
          <div class="form-group">
            <label for="grado">Grado:</label>
            <input type="text" class="form-control" id="grado" name="grado">
          </div>
          <div class="form-group">
            <label for="nivelEducativo">Nivel Educativo:</label>
            <input type="text" class="form-control" id="nivelEducativo" name="nivel_educativo">
          </div>
          <div class="form-group">
            <label for="direccion">Dirección:</label>
            <input type="text" class="form-control" id="direccion" name="direccion">
          </div>
          <div class="form-group">
            <label for="departamento">Departamento:</label>
            <select class="form-control" id="departamento" name="departamento">
              <option value="San Salvador">San Salvador</option>
              <option value="Santa Ana">Santa Ana</option>
              <!-- Agrega más opciones de departamentos aquí -->
            </select>
          </div>
          <div class="form-group">
            <label for="municipio">Municipio:</label>
            <input type="text" class="form-control" id="municipio" name="municipio">
          </div>
          <div class="form-group">
            <label for="celularUno">Celular Uno:</label>
            <input type="text" class="form-control" id="celularUno" name="celular_uno">
          </div>
          <div class="form-group">
            <label for="celularDos">Celular Dos:</label>
            <input type="text" class="form-control" id="celularDos" name="celular_dos">
          </div>
          <div class="form-group">
            <label for="celularTres">Celular Tres:</label>
            <input type="text" class="form-control" id="celularTres" name="celular_tres">
          </div>
          <!-- Otros campos del formulario -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary" id="guardarCitaBtn">Guardar Cita</button>
        </div>
      </div>
    </div>
  </div>
  