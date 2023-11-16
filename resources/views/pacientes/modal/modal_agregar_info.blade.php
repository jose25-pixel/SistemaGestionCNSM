<div class="modal fade" id="modalIngresoPaciente" tabindex="-1" role="dialog" aria-labelledby="modalNuevaCitaLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width:90%">
        <div class="modal-content">
            <div class="modal-header py-1 bg-primary">
                <h2 class=" text-center" id=""><strong> Datos de consultante</strong> </h2>
                <button type="button" class="close" data-dismiss="modal" id="">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="pacienteForm" method="POST">
                @csrf
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-body" style="max-height: 550px; overflow-y: auto;">
                    <h5 class="text-center mt-2" id=""><strong>Datos del consultante</strong></h5>
                    <!-- campos del paciente -->
                    <div class=" pt-3">
                        <div class="card">
                            <div class="card-header bg-light" data-toggle="collapse" data-target="#datospaciente" aria-expanded="false">
                                <h3 class="card-title">Ingresar datos del consultante</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool collapsed" data-card-widget="collapse" title="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body  m-0 p-3" id="datospaciente">
                                <div class="form-row pt-4">
                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="numero">Selecionar Cosultante:</label>
                                        <div class="input-group is-invalid">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" style="cursor: pointer" for="btnaddcita" id="btnaddcita"><i style="cursor: pointer" class="fas fa-plus"></i></label>
                                                <label for="" class="input-group-text" id="nombre_paciente_referencia"></label>
                                                <span></span>
                                            </div>
                                            <input class="form-control" type="hidden" name="cita_id" id="cita_id" readonly required>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="fecha_naci">Fecha de Nacimiento*:</label>
                                        <input type="date" class="form-control" id="fecha_naci" name="fecha_naci" required>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="genero">Sexo*:</label>
                                        <select class="form-control" id="genero" name="genero">
                                            <option value="HOLA">HOMBRE</option>
                                            <option value="femenino">MUJER</option>
                                            <option value="femenino">OTRO</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="edad">Edad*:</label>
                                        <input type="number" class="form-control" id="edad" name="edad" placeholder="Ingresa tu edad">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="grado">Grado:(niño/niña)</label>
                                        <input type="text" class="form-control" onkeyup="mayupaciente(this)" id="grado" name="grado" placeholder="Noveno Grado">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="lugar_estudio">Lugar de Estudio:(niño/niña) </label>
                                        <input type="text" class="form-control" onkeyup="mayupaciente(this)" id="lugar_estudio" name="lugar_estudio" placeholder="Centro Escolar">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="ocupacion">Ocupación*:</label>
                                        <input type="text" class="form-control" onkeyup="mayupaciente(this)" id="ocupacion" name="ocupacion" placeholder="Profeción y oficio">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                        <label for="dirrecion">Dirreción*:</label>
                                        <input id="direccion" name="direccion" onkeyup="mayupaciente(this)" class="form-control clear-input" placeholder="Avenida Principal
                                            Colonia San Benito">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="nivel_educativo">Nivel Educativo*:</label>
                                        <input type="text" class="form-control" onkeyup="mayupaciente(this)" id="nivel_educativo" name="nivel_educativo" placeholder="Basico">
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
                                            <option value="Ahuachapan">Ahuachapan</option>
                                            <option value="Union">Union</option>
                                            <option value="Cabañas">Cabañas</option>
                                            <option value="Usulutan">Usulután</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                        <label for="municipio">Municipio*:</label>
                                        <select id="municipio" name="municipio" onkeyup="mayupaciente(this)" class="form-control "></select>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                        <label for="celular_dos">Celular Dos:</label>
                                        <input type="text" class="form-control" id="celular_dos" name="celular_dos" placeholder="6745-3456">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                        <label for="celular_tres">Celular Tres:</label>
                                        <input type="text" class="form-control" id="celular_tres" name="celular_tres" placeholder="6436-2331">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                        <label for="nu_hermano">Numero de Hermanos:</label>
                                        <input type="text" class="form-control" id="nu_hermano" name="nu_hermano" placeholder="2 hermanos">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                        <label for="lugar_ocupa">Lugar que Ocupa hermanos/as:</label>
                                        <input type="text" onkeyup="mayupaciente(this)" class="form-control" id="lugar_ocupa" name="lugar_ocupa" placeholder="Ultimo">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                        <label for="nu_hijo">Numero de Hijos:</label>
                                        <input type="text" class="form-control" id="nu_hijo" name="nu_hijo" placeholder="Dos hijos">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                        <label for="edad_hijo">Edades Hijos:</label>
                                        <input type="text" class="form-control" id="edad_hijo" name="edad_hijo" placeholder="12 años, 7 años">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                        <label for="ano_casado">Años de Casado</label>
                                        <input type="text" class="form-control" id="ano_casado" onkeyup="mayupaciente(this)" name="ano_casado" placeholder="Años de casado">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 lass="text-center mt-2"><strong> Datos Familiares </strong></h4>
                    <h5 class="text-center mt-2"><strong> Datos de la Madre </strong></h5>
                    <!-- input de familiares ---madre--- -->
                    <div class="card">
                        <div class="card-header bg-light" data-toggle="collapse" data-target="#datosMadre" aria-expanded="false">
                            <h3 class="card-title">Ingresar Datos de la Madre</h3>
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
                                    <input type="text" class="form-control" onkeyup="mayupaciente(this)" id="nombre_madre" name="nombre_madre" placeholder="Maria Ester">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="edad_madre">Edad madre:</label>
                                    <input type="number" class="form-control" id="edad_madre" name="edad_madre" placeholder="30">
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label for="estado_civilm">Estado Civil madre:</label>
                                    <select class="form-control" onkeyup="mayupaciente(this)" id="estado_civilm" name="estado_civilm">
                                        <option value="--">***</option>
                                        <option value="soltera">SOlTERA</option>
                                        <option value="casada">CASADA</option>
                                        <option value="acompañada">ACOMPAÑADA</option>
                                        <option value="viuda">VIUDA</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="nivel_educativom">Nivel Educativo Madre:</label>
                                    <input type="text" onkeyup="mayupaciente(this)" class="form-control" id="nivel_educativom" name="nivel_educativom" placeholder=" Basico">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="ocupacionm">Ocupacion Madre:</label>
                                    <input type="text" class="form-control" onkeyup="mayupaciente(this)" id="ocupacionm" name="ocupacionm" placeholder="Ama de Casa">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="duim">Dui Madre:</label>
                                    <input type="text" class="form-control" id="duim" name="duim" placeholder="76452345-6">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="vivem">Vive con Madre:</label>
                                    <select class="form-control" onkeyup="mayupaciente(this)" id="vivem" name="vivem" placeholder="Si / No">
                                        <option value="">---</option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="notam">Nota:</label>
                                    <textarea onkeyup="mayupaciente(this)" class="form-control cls-input oblig-input" type="text" class="form-control" id="notam" name="notam" placeholder="Ingrese datos extra"></textarea>
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="viveaunm">Vive su madre Aun?:</label>
                                    <select class="form-control" onkeyup="mayupaciente(this)" id="viveaunm" name="viveaunm">
                                        <option value="--">--</option>
                                        <option value="NO">NO</option>
                                        <option value="SI">SI</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- input de familiares ---padre--- -->
                    <h5 class="text-center mt-2"><strong> Datos del Padre </strong></h5>
                    <div class="card">
                        <div class="card-header bg-light" data-toggle="collapse" data-target="#datosPadre" aria-expanded="false">
                            <h3 class="card-title">Ingresar Datos del Padre</h3>
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
                                    <input type="text" class="form-control" onkeyup="mayupaciente(this)" id="nombrep" name="nombrep" placeholder="Pedro Enesto Escalante">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="edadp">Edad Padre:</label>
                                    <input type="number" class="form-control" id="edadp" name="edadp" placeholder="50">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="estado_civilp">Estado Civil Padre:</label>
                                    <select class="form-control" onkeyup="mayupaciente(this)" id="estado_civilp" name="estado_civilp">
                                        <option value="***">***</option>
                                        <option value="soltero">SOLTERO</option>
                                        <option value="casado">CASADO</option>
                                        <option value="acompañado">ACOMPAÑADO</option>
                                        <option value="viudo">VIUDO</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="ocupacionp">Ocupacion Padre:</label>
                                    <input type="text" class="form-control" onkeyup="mayupaciente(this)" id="ocupacionp" name="ocupacionp" placeholder="Electricista">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="nivel_educativop">Nivel Educativo Padre:</label>
                                    <input type="text" class="form-control" onkeyup="mayupaciente(this)" id="nivel_educativop" name="nivel_educativop" placeholder="Basico">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="duip">Dui Padre:</label>
                                    <input type="text" class="form-control" id="duip" name="duip" placeholder="34356325-5">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="viveaunp">Vive su Padre?</label>
                                    <select type="text" class="form-control" onkeyup="mayupaciente(this)" id="viveaunp" name="viveaunp">
                                        <option value="--">---</option>
                                        <option value="NO">NO</option>
                                        <option value="SI">SI</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="notap">Nota:</label>
                                    <textarea class="form-control cls-input oblig-input" type="text" class="form-control" id="notap" class="form-control cls-input oblig-input" type="text" onkeyup="mayupaciente(this)" name="notap"></textarea>
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="vivep">Vive con su Padre: si/no</label>
                                    <select type="text" class="form-control" onkeyup="mayupaciente(this)" id="vivep" name="vivep">
                                        <option value="--">--</option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- input de conyuge -->
                    <h5 class="text-center mt-2"><strong> Datos del Conyuge </strong></h5>
                    <div class="card">
                        <div class="card-header bg-light" data-toggle="collapse" data-target="#datosConyuge" aria-expanded="false">
                            <h3 class="card-title">Ingresar datos del Conyuge</h3>
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
                                    <input type="text" class="form-control" onkeyup="mayupaciente(this)" id="nombrec" name="nombrec" placeholder="Juana Guadalupe ">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="edadc">Edad Conyuge:</label>
                                    <input type="number" class="form-control" id="edadc" name="edadc" placeholder="edad">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="ocupacionc">Ocupacion Conyuge:</label>
                                    <input type="text" class="form-control" onkeyup="mayupaciente(this)" id="ocupacionc" name="ocupacionc" placeholder="Secretaria">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="nivel_educativoc">Nivel educativo Conyuge:</label>
                                    <input type="text" class="form-control" onkeyup="mayupaciente(this)" id="nivel_educativoc" name="nivel_educativoc" placeholder="Educación Media">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="notac">Nota:</label>
                                    <textarea class="form-control" class="form-control cls-input oblig-input" type="text" maxlength="200" rows="6" id="notac" onkeyup="mayupaciente(this)" name="notac"></textarea>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- input de responsable -->
                    <h5 class="text-center mt-2"><strong>Datos del Responsable </strong></h5>
                    <div class="card">
                        <div class="card-header bg-light " data-toggle="collapse" data-target="#datosResponsable" aria-expanded="false">
                            <h3 class="card-title">Ingresar Datos del Responsable</h3>

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
                                        <option value="soltero">---</option>
                                        <option value="soltero">Soltero</option>
                                        <option value="casado">Casado</option>
                                        <option value="acompañado">Acompañado</option>
                                        <option value="viudo">Viudo</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="duir">Dui Responsable:</label>
                                    <input type="text" class="form-control" name="duir" id="duir">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <h5 class="text-center mt-2"> <strong>Datos Antecedentes de Salud </strong> </h5>
                    <div class="card">
                        <div class="card-header bg-light" data-toggle="collapse" data-target="#datosAntecedentes" aria-expanded="false">
                            <h3 class="card-title">Ingresar datos antecedentes de salud</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool collapsed" data-card-widget="collapse" title="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body collapse m-0 p-3" id="datosAntecedentes">
                            <div class="form-row pt-4">
                                <hr>
                                <div class="form-group col-sm-12 col-md-6 col-xl-4">
                                    <label for="patologias">Enfermedades Crónicas Hospitalizaciones:</label>
                                    <textarea class="form-control" id="patologias" class="form-control cls-input oblig-input" type="text" onkeyup="mayupaciente(this)" name="patologias"></textarea>
                                </div>
                                <div class="form-group col-sm-12 col-md-6 col-xl-4">
                                    <label for="enfergenetica">Enfermedades Crónicas, Genéticas de importancia de
                                        familiares:</label>
                                    <textarea class="form-control" id="enfergenetica" onkeyup="mayupaciente(this)" class="form-control cls-input oblig-input" type="text" name="enfergenetica"></textarea>
                                </div>
                                <div class="form-group col-sm-12 col-md-6 col-xl-4">
                                    <label for="otros">Otras:</label>
                                    <textarea class="form-control" id="otros" class="form-control cls-input oblig-input" type="text" onkeyup="mayupaciente(this)" name="otros"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 class="text-center mt-2"> <strong>Datos Antecedentes Laborales </strong> </h5>
                    <div class="card">
                        <div class="card-header bg-light" data-toggle="collapse" data-target="#datosLaborales" aria-expanded="false">

                            <h3 class="card-title">Ingresar datos antecedentes laborales</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool collapsed" data-card-widget="collapse" title="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>

                            </div>

                        </div>
                        <div class="card-body collapse m-0 p-3" id="#datosLaborales">
                            <div class="form-row pt-4">

                                <hr>

                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="iniciotrabajar">Edad en la que inicio a trabajar:</label>
                                    <input type="text" class="form-control" id="iniciotrabajar" onkeyup="mayupaciente(this)" name="iniciotrabajar">
                                </div>

                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="trabaja">Nunca ha trabajado: si/no</label>
                                    <select type="text" class="form-control" onkeyup="mayupaciente(this)" id="trabaja" name="trabaja">
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </div>



                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="trabaja_actualmente">Trabaja Actualmente: si/no</label>
                                    <select type="text" class="form-control" onkeyup="mayupaciente(this)" id="trabaja_actualmente" name="trabaja_actualmente">
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </div>




                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="duracion_empleo">Duración de los ultimos empleos: </label>
                                    <input type="text" class="form-control" onkeyup="mayupaciente(this)" id="duracion_empleo" name="duracion_empleo">
                                </div>





                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="despedido">¿Ha sido despedido?: si/no</label>
                                    <select type="text" class="form-control" onkeyup="mayupaciente(this)" id="despedido" name="despedido">
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </div>



                                <div class="form-group col-sm-12 col-md-6 col-xl-4">
                                    <label for="causa">Causas por las cuales fue despedida:</label>
                                    <textarea class="form-control cls-input oblig-input" type="text" class="form-control" id="causa" onkeyup="mayupaciente(this)" name="causa"></textarea>
                                </div>

                                <div class="form-group col-sm-12 col-md-6 col-xl-4">
                                    <label for="satisfecho">Satisfecho con trayectoria laboral:</label>
                                    <textarea class="form-control cls-input oblig-input" type="text" class="form-control" id="satisfecho" onkeyup="mayupaciente(this)" name="satisfecho"></textarea>
                                </div>


                            </div>

                        </div>
                    </div>
                    <!--  codigo de tratamientos previos -->
                    <h5 class="text-center mt-2"> <strong>Tratamientos Previos </strong> </h5>

                    <div class="card">
                        <div class="card-header bg-light" data-toggle="collapse" data-target="#datosTratamientos" aria-expanded="false">

                            <h3 class="card-title">Ingresar datos de tratamientos previos de salud</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool collapsed" data-card-widget="collapse" title="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body collapse m-0 p-3" id="datosTratamientos">
                            <div class="form-row pt-4">
                                <hr>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="atencioncnsm">Ha Recibido Tratameinto Psicológico: si/no</label>
                                    <select type="text" class="form-control" onkeyup="mayupaciente(this)" id="atencioncnsm" name="atencioncnsm">
                                        <option value="--">--</option>
                                        <option value="NO">NO</option>
                                        <option value="SI">SI</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="atencioncnsm">Que tipo de tratamiento ha recibido:</label>
                                    <select type="text" class="form-control" onkeyup="mayupaciente(this)" id="atencioncnsm" name="atencioncnsm">
                                        <option value="NO">NINGUNO</option>
                                        <option value="OTROS">OTROS</option>
                                        <option value="PSICOLOGÍCO">PSICOLOGÍCO</option>
                                        <option value="PSIQUIÁTRICO">PSIQUIÁTRICO</option>
                                        <option value="NEUROLOGÍCO">NEUROLOGÍCO</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="nombreatendio">Nombre De terapeuta atendio:</label>
                                    <input type="text" class="form-control" id="nombreatendio" onkeyup="mayupaciente(this)" name="nombreatendio">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="direcionatendio">Dirección terapeuta atendio:</label>
                                    <input type="text" class="form-control" id="direcionatendio" onkeyup="mayupaciente(this)" name="direcionatendio">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="telefonoatendio">Telefono Terapeuta Atendio:</label>
                                    <input type="text" class="form-control" id="telefonoatendio" onkeyup="mayupaciente(this)" name="telefonoatendio">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  codigo de tratamientos recibidos -->
                    <h5 class="text-center mt-2"> <strong>Tratamientos Recibidos </strong> </h5>
                    <div class="card">
                        <div class="card-header bg-light" data-toggle="collapse" data-target="#datosrecibidos" aria-expanded="false">
                            <h3 class="card-title">Ingresar Datos de Tratamientos Recibidos</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool collapsed" data-card-widget="collapse" title="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body collapse m-0 p-3" id="datosRecibidos">
                            <div class="form-row pt-4">
                                <hr>
                                <div class="form-group col-sm-12 col-md-4 col-xl-6">
                                    <label for="tratamientorec">Tratamientos Recibidos:</label>
                                    <textarea class="form-control" id="tratamientorec" onkeyup="mayupaciente(this)" name="tratamientorec"></textarea>
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-6">
                                    <label for="tipofarmaco">Tipo Farmaco a Consumido:</label>
                                    <input type="text" class="form-control" id="tipofarmaco" onkeyup="mayupaciente(this)" name="tipofarmaco">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  codigo de sustancias --->
                    <h5 class="text-center mt-2"> <strong>Consumo de Sustancias y Addiciones </strong> </h5>
                    <div class="card">
                        <div class="card-header bg-light" data-toggle="collapse" data-target="#sustancias" aria-expanded="false">
                            <h3 class="card-title">Ingresar datos de consumo de sustancia y addiciones</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool collapsed" data-card-widget="collapse" title="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>

                            </div>

                        </div>
                        <div class="card-body collapse m-0 p-3" id="sustancias">
                            <div class="form-row pt-4">
                                <hr>
                                <div class="form-group col-sm-12 col-md-6 col-xl-6">
                                    <label for="tipo_sustancia">Tipo de Sustancia Consumida:</label>
                                    <input type="text" class="form-control" id="tipo_sustancia" onkeyup="mayupaciente(this)" name="tipo_sustancia">
                                </div>

                                <div class="form-group col-sm-12 col-md-6 col-xl-6">
                                    <label for="tiempo_consumo">Tiempo de Consumo:</label>
                                    <input type="text" class="form-control" id="tiempo_consumo" onkeyup="mayupaciente(this)" name="tiempo_consumo">
                                </div>

                                <div class="form-group col-sm-12 col-md-6 col-xl-6">
                                    <label for="adicion">Adicciones:</label>
                                    <textarea class="form-control cls-input oblig-input" type="text" class="form-control" id="adicion" onkeyup="mayupaciente(this)" name="adicion"></textarea>
                                </div>

                            </div>
                        </div>
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
