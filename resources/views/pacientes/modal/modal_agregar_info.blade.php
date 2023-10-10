<div class="modal fade" id="modalIngresoPaciente" tabindex="-1" role="dialog" aria-labelledby="modalNuevaCitaLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 90%">
        <div class="modal-content">
            <div class="modal-header py-1 bg-primary">
                <h2 class=" text-center" id=""><strong> Datos de paciente</strong> </h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="pacienteForm" method="POST">
                @csrf
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-body" style="max-height: 550px; overflow-y: auto;">

                    <h5 class="text-center mt-2" id=""><strong>Datos  del paciente</strong></h5>
                    <!-- campos del paciente -->
                    <div class=" pt-3">

                        <div class="card">
                            <div class="card-header bg-light" data-toggle="collapse" data-target="#datospaciente" aria-expanded="false">
                                <h3 class="card-title">Ingresar datos del paciente</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool collapsed" data-card-widget="collapse" title="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>

                                </div>
                            </div>
                            <div class="card-body  m-0 p-3" id="datospaciente">
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
                                                <option value="masculino">MACULINO</option>
                                                <option value="femenino">FEMENINO</option>
                                                <option value="femenino">LGTB</option>
                                            </select>

                                        </div>

                                        <div class="form-group col-sm-12 col-md-3">
                                            <label for="edad">Edad*:</label>
                                            <input type="number" class="form-control" id="edad" name="edad">
                                        </div>

                                        <div class="form-group col-sm-12 col-md-4">
                                            <label for="grado">Grado:(niño/niña)</label>
                                            <input type="text" class="form-control" onkeyup="mayupaciente(this)" id="grado" name="grado">
                                        </div>




                                        <div class="form-group col-sm-12 col-md-4">
                                            <label for="lugar_estudio">Lugar de Estudio:(niño/niña) </label>
                                            <input type="text" class="form-control" onkeyup="mayupaciente(this)" id="lugar_estudio" name="lugar_estudio">
                                        </div>

                                        <div class="form-group col-sm-12 col-md-4">
                                            <label for="ocupacion">Ocupación*:</label>
                                            <input type="text" class="form-control" onkeyup="mayupaciente(this)" id="ocupacion" name="ocupacion">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                            <label for="dirrecion">Dirreción*:</label>
                                            <input id="direccion" name="direccion" onkeyup="mayupaciente(this)" class="form-control clear-input">
                                        </div>

                                        <div class="form-group col-sm-12 col-md-4">
                                            <label for="nivel_educativo">Nivel Educativo*:</label>
                                            <input type="text" class="form-control" onkeyup="mayupaciente(this)" id="nivel_educativo" name="nivel_educativo">
                                        </div>





                                        <div class="form-group col-sm-12 col-md-4">
                                            <label for="departamento">Departamento*:</label>
                                            <select class="form-control" onkeyup="mayupaciente(this)" name="departamento" id="departamento">
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
                                                <option value="Ahuachapan">Ahuachapan</option>
                                                <option value="Cabañas">Cabañas</option>
                                                <option value="Usulutan">Usulután</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                            <label for="municipio">Municipio*:</label>
                                            <select id="municipio" name="municipio" onkeyup="mayupaciente(this)" class="form-control clear-input"></select>
                                        </div>

                                        <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                            <label for="celular_dos">Celular Dos*:</label>
                                            <input type="text" class="form-control" id="celular_dos" name="celular_dos">
                                        </div>

                                        <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                            <label for="celular_tres">Celular Tres:</label>
                                            <input type="text" class="form-control" id="celular_tres" name="celular_tres">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <h4 lass="text-center mt-2"><strong> Datos Familiares </strong></h4>
                        <h5 class="text-center mt-2"><strong> Datos de la madre </strong></h5>
                        <!-- input de familiares ---madre--- -->

                        <div class="card">
                            <div class="card-header bg-light" data-toggle="collapse" data-target="#datosMadre" aria-expanded="false">
                                <h3 class="card-title">Ingresar datos de la madre</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool collapsed" data-card-widget="collapse" title="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>

                                </div>
                            </div>
                            <div class="card-body collapse m-0 p-3" id="datosMadre">
                                <div class="form-row pt-4">
                                    <hr>
                                    <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                        <label for="nombre_madre">Nombre Madre:</label>
                                        <input type="text" class="form-control" onkeyup="mayupaciente(this)" id="nombre_madre" name="nombre_madre">
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                        <label for="edad_madre">Edad madre:</label>
                                        <input type="number" class="form-control" id="edad_madre" name="edad_madre">
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="estado_civilm">Estado Civil madre:</label>
                                        <select class="form-control" onkeyup="mayupaciente(this)" id="estado_civilm" name="estado_civilm">
                                            <option value="soltera">SOlTERA</option>
                                            <option value="casada">CASADA</option>
                                            <option value="acompañada">ACOMPAÑADA</option>
                                            <option value="viuda">VIUDA</option>

                                        </select>

                                    </div>

                                    <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                        <label for="nivel_educativom">Nivel educativo madre:</label>
                                        <input type="text" onkeyup="mayupaciente(this)" class="form-control" id="nivel_educativom" name="nivel_educativom">
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                        <label for="ocupacionm">Ocupacion madre:</label>
                                        <input type="text" class="form-control" onkeyup="mayupaciente(this)" id="ocupacionm" name="ocupacionm">
                                    </div>
                            

                                    <div class="form-group col-sm-12 col-md-3 col-xl-4">
                                        <label for="genero">Género*:</label>
                                        <select class="form-control"onkeyup="mayupaciente(this)" id="vivem" name="vivem">
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>

                                        </select>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- input de familiares ---padre--- -->
                        <h5 class="text-center mt-2"><strong> Datos del Padre </strong></h5>

                        <div class="card">
                            <div class="card-header bg-light" data-toggle="collapse" data-target="#datosPadre" aria-expanded="false">
                                <h3 class="card-title">Ingresar datos del Padre</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool collapsed" data-card-widget="collapse" title="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>

                                </div>
                            </div>
                            <div class="card-body collapse m-0 p-3" id="datosPadre">
                                <div class="form-row pt-4">
                                    <hr>
                                    <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                        <label for="nombrep">Nombre Padre:</label>
                                        <input type="text" class="form-control" onkeyup="mayupaciente(this)" id="nombrep" name="nombrep">
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                        <label for="edadp">Edad Padre:</label>
                                        <input type="number" class="form-control" id="edadp" name="edadp">
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                        <label for="estado_civilp">Estado Civil Padre:</label>
                                        <select class="form-control" onkeyup="mayupaciente(this)" id="estado_civilp" name="estado_civilp">
                                            <option value="soltero">SOLTERO</option>
                                            <option value="casado">CASADO</option>
                                            <option value="acompañado">ACOMPAÑADO</option>
                                            <option value="viudo">VIUDO</option>

                                        </select>

                                    </div>


                                    <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                        <label for="ocupacionp">Ocupacion Padre:</label>
                                        <input type="text" class="form-control" onkeyup="mayupaciente(this)" id="ocupacionp" name="ocupacionp">
                                    </div>


                                    <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                        <label for="nivel_educativop">Nivel educativo Padre:</label>
                                        <input type="text" class="form-control" onkeyup="mayupaciente(this)" id="nivel_educativop" name="nivel_educativop">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                        <label for="vivep">Vive Padre: si/no</label>
                                        <input type="text" class="form-control" onkeyup="mayupaciente(this)" id="vivep" name="vivep">
                                    </div>

                                </div>
                            </div>
                        </div>


                        <!-- input de conyuge -->
                        <h5 class="text-center mt-2"><strong> Datos del Conyuge </strong></h5>

                        <div class="card">
                            <div class="card-header bg-light" data-toggle="collapse" data-target="#datosConyuge" aria-expanded="false">
                                <h3 class="card-title">Ingresar datos del conyuge</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool collapsed" data-card-widget="collapse" title="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>

                                </div>
                            </div>
                            <div class="card-body collapse m-0 p-3" id="datosConyuge">
                                <div class="form-row pt-4">
                                    <hr>
                                    <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                        <label for="nombrec">Nombre Conyuge:</label>
                                        <input type="text" class="form-control"onkeyup="mayupaciente(this)" id="nombrec" name="nombrec">
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                        <label for="edadc">Edad Conyuge:</label>
                                        <input type="number" class="form-control" id="edadc" name="edadc">
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                        <label for="ocupacionc">Ocupacion Conyuge:</label>
                                        <input type="text" class="form-control" onkeyup="mayupaciente(this)" id="ocupacionc" name="ocupacionc">
                                    </div>



                                    <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                        <label for="nivel_educativoc">Nivel educativo Conyuge:</label>
                                        <input type="text" class="form-control" onkeyup="mayupaciente(this)" id="nivel_educativoc" name="nivel_educativoc">
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
                            </div>
                        </div>

                        <!-- input de responsable -->
                        <h5 class="text-center mt-2"><strong> Datos del Responsable </strong></h5>
                        <div class="card">
                            <div class="card-header bg-light " data-toggle="collapse" data-target="#datosResponsable" aria-expanded="false">
                                <h3 class="card-title">Ingresar datos del responsable</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool collapsed" data-card-widget="collapse" title="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>

                                </div>
                            </div>
                            <div class="card-body collapse m-0 p-3" id="datosResponsable">
                                <div class="form-row pt-4">
                                    <hr>
                                    <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                        <label for="nombrer">Nombre Resonsable:</label>
                                        <input type="text" class="form-control" id="nombrer" onkeyup="mayupaciente(this)" name="nombrer">
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                        <label for="edadr">Edad Responsable:</label>
                                        <input type="number" class="form-control" id="edadr" name="edadr">
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                        <label for="ocupacionr">Ocupacion Responsable:</label>
                                        <input type="text" class="form-control" id="ocupacionr" onkeyup="mayupaciente(this)" name="ocupacionr">
                                    </div>



                                    <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                        <label for="nivel_educativor">Nivel educativo Responsable:</label>
                                        <input type="text" class="form-control" onkeyup="mayupaciente(this)" id="nivel_educativor" name="nivel_educativor">
                                    </div>


                                    <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                        <label for="estado_civilr">Estado Civil Responsable:</label>
                                        <select class="form-control" onkeyup="mayupaciente(this)" id="estado_civilr" name="estado_civilr">
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
                                        <label for="lugar_ocupa">Lugar que Ocupa hermanos/as:</label>
                                        <input type="text" class="form-control" id="lugar_ocupa" name="lugar_ocupa">
                                    </div>
                     
                                   
                                    <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                        <label for="nu_hijo">Numero de Hijos:</label>
                                        <input type="number" class="form-control" id="nu_hijo" name="nu_hijo">
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                        <label for="edad_hijo">Edades Hijos:</label>
                                        <input type="text" class="form-control" id="edad_hijo" name="edad_hijo">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                        <label for="nombre_conyugue">Nombre Conyuge:</label>
                                        <input type="text" class="form-control" onkeyup="mayupaciente(this)" id="nombre_conyugue" name="nombre_conyugue">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                        <label for="ano_casado">Años de casado</label>
                                        <input type="number" class="form-control" id="ano_casado" name="ano_casado">
                                    </div>

                                </div>
                            </div>
                            <!-- /.card-footer-->
                        </div>
                    </div>



                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-success btn-lg"><i class="fas fa-save"></i>
                            Ingresar<span id=""></span></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
