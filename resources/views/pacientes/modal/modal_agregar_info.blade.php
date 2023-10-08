<div class="modal fade" id="modalIngresoPaciente" tabindex="-1" role="dialog" aria-labelledby="modalNuevaCitaLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 90%">
        <div class="modal-content">
            <div class="modal-header py-1 bg-primary">
                <h5 class="" id=""> Datos de paciente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="pacienteForm" method="POST">
                @csrf
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-body" style="max-height: 600px; overflow-y: auto;">

                    <h3 class="text-center mt-2" id=""></h3>
                    <!-- campos del paciente -->
                    <div class="form-row pt-4">
                        <div class="form-group col-sm-12 col-md-3">
                            <label for="numero"> Selecione Paciente*:</label>
                            <div class="input-group is-invalid">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="cita""></label>
              </div>
              <select class=" custom-select" name="cita_id" id="cita_id" required>
                                        </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-3">
                                <label for="fecha_naci">Fecha de Nacimiento*:</label>
                                <input type="date" class="form-control" id="fecha_naci" name="fecha_naci" required>
                            </div>
                            <div class="form-group col-sm-12 col-md-3">
                                <label for="genero">Género*:</label>
                                <select class="form-control" id="genero" name="genero">
                                    <option value="masculino">Masculino</option>
                                    <option value="femenino">Femenino</option>
                                    <option value="femenino">LGTB</option>
                                </select>

                            </div>

                            <div class="form-group col-sm-12 col-md-3">
                                <label for="edad">Edad*:</label>
                                <input type="number" class="form-control" id="edad" name="edad">
                            </div>

                            <div class="form-group col-sm-12 col-md-4">
                                <label for="grado">Grado:(niño/niña)</label>
                                <input type="text" class="form-control" id="grado" name="grado">
                            </div>




                            <div class="form-group col-sm-12 col-md-4">
                                <label for="lugar_estudio">Lugar de Estudio:(niño/niña) </label>
                                <input type="text" class="form-control" id="lugar_estudio" name="lugar_estudio">
                            </div>

                            <div class="form-group col-sm-12 col-md-4">
                                <label for="ocupacion">Ocupación:</label>
                                <input type="text" class="form-control" id="ocupacion" name="ocupacion">
                            </div>
                            <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                <label for="dirrecion">Dirreción*:</label>
                                <input id="direccion" name="direccion" class="form-control clear-input">
                            </div>

                            <div class="form-group col-sm-12 col-md-4">
                                <label for="nivel_educativo">Nivel Educativo*:</label>
                                <input type="text" class="form-control" id="nivel_educativo" name="nivel_educativo">
                            </div>





                            <div class="form-group col-sm-12 col-md-4">
                                <label for="departamento">Departamento*:</label>
                                <select class="form-control" name="departamento" id="departamento">
                                    <option value="">Seleccionar</option>
                                    <option value="San Salvador">San Salvador</option>
                                    <option value="Santa Ana">Santa Ana</option>
                                    <option value="La Libertad">La Libertad</option>
                                    <option value="San Miguel">San Miguel</option>
                                    <option value="Sonsonate">Sonsonate</option>
                                    <option value="Cuscatlán">Cuscatlán</option>
                                    <option value="La Paz">La Paz</option>
                                    <option value="Chalatenango">Chalatenango</option>
                                    <option value="Cabañas">Cabañas</option>
                                    <option value="Morazán">Morazán</option>
                                    <option value="Unión">Unión</option>
                                    <option value="Ahuchapan">Ahuchapan</option>
                                    <option value="Cabañas">Cabañas</option>
                                    <option value="Usulutan">Usulutan</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                <label for="municipio">Municipio*:</label>
                                <input id="municipio" name="municipio" class="form-control clear-input">
                            </div>

                            <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                <label for="celular_dos">Celular Dos*:</label>
                                <input type="text" class="form-control" id="celular_dos" name="celular_dos">
                            </div>

                            <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                <label for="celular_tres">Celular Tres*:</label>
                                <input type="text" class="form-control" id="celular_tres" name="celular_tres">
                            </div>
                        </div>

                        <h4 lass="text-center mt-2"><strong> Datos Familiares </strong></h4>
                        <h5 class="text-center mt-2"><strong> Datos de la madre </strong></h5>
                        <!-- input de familiares ---madre--- -->
                        <div class="form-row pt-4">
                            <hr>
                            <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                <label for="nombre_madre">Nombre Madre:</label>
                                <input type="text" class="form-control" id="nombre_madre" name="nombre_madre">
                            </div>

                            <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                <label for="edad_madre">Edad madre:</label>
                                <input type="number" class="form-control" id="edad_madre" name="edad_madre">
                            </div>

                            <div class="form-group col-sm-12 col-md-4">
                                <label for="estado_civilm">Estado Civil madre:</label>
                                <select class="form-control" id="estado_civilm" name="estado_civilm">
                                    <option value="soltera">Soltera</option>
                                    <option value="casada">Casada</option>
                                    <option value="acompañada">Acompañada</option>
                                    <option value="viuda">Viuda</option>

                                </select>

                            </div>

                            <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                <label for="nivel_educativom">Nivel educativo madre:</label>
                                <input type="text" class="form-control" id="nivel_educativom" name="nivel_educativom">
                            </div>

                            <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                <label for="ocupacionm">Ocupacion madre:</label>
                                <input type="text" class="form-control" id="ocupacionm" name="ocupacionm">
                            </div>
                            <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                <label for="vivem">Vive madre: si /no</label>
                                <input type="text" class="form-control" id="vivem" name="vivem">
                            </div>

                        </div>
                        <!-- input de familiares ---padre--- -->
                        <h5 class="text-center mt-2"><strong> Datos del Padre </strong></h5>

                        <div class="form-row pt-4">
                            <hr>
                            <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                <label for="nombrep">Nombre Padre:</label>
                                <input type="text" class="form-control" id="nombrep" name="nombrep">
                            </div>

                            <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                <label for="edadp">Edad Padre:</label>
                                <input type="number" class="form-control" id="edadp" name="edadp">
                            </div>

                            <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                <label for="estado_civilp">Estado Civil Padre:</label>
                                <select class="form-control" id="estado_civilp" name="estado_civilp">
                                    <option value="soltero">Soltero</option>
                                    <option value="casado">Casado</option>
                                    <option value="acompañado">Acompañado</option>
                                    <option value="viudo">Viudo</option>

                                </select>

                            </div>


                            <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                <label for="ocupacionp">Ocupacion Padre:</label>
                                <input type="text" class="form-control" id="ocupacionp" name="ocupacionp">
                            </div>


                            <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                <label for="nivel_educativop">Nivel educativo madre:</label>
                                <input type="text" class="form-control" id="nivel_educativop" name="nivel_educativop">
                            </div>

                        </div>
                        <!-- input de conyuge -->
                        <h4 class="text-center mt-2"><strong> Datos del Conyuge </strong></h4>
                        <div class="form-row pt-4">
                            <hr>
                            <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                <label for="nombrec">Nombre Conyuge:</label>
                                <input type="text" class="form-control" id="nombrec" name="nombrec">
                            </div>

                            <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                <label for="edadc">Edad Conyuge:</label>
                                <input type="number" class="form-control" id="edadc" name="edadc">
                            </div>

                            <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                <label for="ocupacionc">Ocupacion Conyuge:</label>
                                <input type="text" class="form-control" id="ocupacionc" name="ocupacionc">
                            </div>



                            <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                <label for="nivel_educativoc">Nivel educativo Conyuge:</label>
                                <input type="text" class="form-control" id="nivel_educativoc" name="nivel_educativoc">
                            </div>

                            <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                <label for="numero_hijo">Numero de Hijos:</label>
                                <input type="text" class="form-control" id="numero_hijo" name="numero_hijo">
                            </div>


                            <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                <label for="edades">Edades Hijos:</label>
                                <input type="text" class="form-control" id="edades" name="edades">
                            </div>

                        </div>


                        <!-- input de responsable -->
                        <h4 class="text-center mt-2"><strong> Datos del Responsable </strong></h4>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Ingresar datos del responsable</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body p-0 m-0">
                              <div class="form-row pt-4">
                                <hr>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="nombrer">Nombre Resonsable:</label>
                                    <input type="text" class="form-control" id="nombrer" name="nombrer">
                                </div>
    
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="edadr">Edad Responsable:</label>
                                    <input type="number" class="form-control" id="edadr" name="edadr">
                                </div>
    
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="ocupacionr">Ocupacion Responsable:</label>
                                    <input type="text" class="form-control" id="ocupacionr" name="ocupacionr">
                                </div>
    
    
    
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="nivel_educativor">Nivel educativo Responsable:</label>
                                    <input type="text" class="form-control" id="nivel_educativor" name="nivel_educativor">
                                </div>
    
    
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="estado_civilr">Estado Civil Responsable:</label>
                                    <select class="form-control" id="estado_civilr" name="estado_civilr">
                                        <option value="soltero">Soltero</option>
                                        <option value="casado">Casado</option>
                                        <option value="acompañado">Acompañado</option>
                                        <option value="viudo">Viudo</option>
    
                                    </select>
    
                                </div>
    
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="nu_hermano">Numero de Hermanos:</label>
                                    <input type="text" class="form-control" id="nu_hermano" name="nu_hermano">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="nu_hermano">Numero de Hermanos/as:</label>
                                    <input type="text" class="form-control" id="nu_hermano" name="nu_hermano">
                                </div>
    
    
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="lugar_ocupa">Lugar que Ocupa hermanos/as:</label>
                                    <input type="text" class="form-control" id="lugar_ocupa" name="lugar_ocupa">
                                </div>
    
    
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="edad_hijo">Edades Hijos:</label>
                                    <input type="text" class="form-control" id="edad_hijo" name="edad_hijo">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="nombre_conyugue">Nombre Conyuge:</label>
                                    <input type="text" class="form-control" id="nombre_conyugue" name="nombre_conyugue">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="ano_casado">Años de casado</label>
                                    <input type="text" class="form-control" id="ano_casado" name="ano_casado">
                                </div>
    
                            </div>
                            </div>
                            <!-- /.card-footer-->
                        </div>
                        







                    </div>



                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-success btn-lg"><i class="fas fa-save"></i> Ingresar<span id=""></span></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
