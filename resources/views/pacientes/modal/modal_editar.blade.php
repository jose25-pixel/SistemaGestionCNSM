<div class="modal fade" id="modal_paciente_editar" tabindex="-1" role="dialog" aria-labelledby="modalNuevaCitaLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 90%">
        <div class="modal-content">
            <div class="modal-header py-1 bg-primary">
                <h2 class=" text-center" id=""><strong> Datos de consultante</strong> </h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formulario_paciente_edit" method="Put">
                @csrf
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-body" style="max-height: 550px; overflow-y: auto;">
                    <h5 class="text-center mt-2" id=""><strong>Editar Información del consultante</strong></h5>
                    <!-- campos del paciente -->
                    <div class=" pt-3">
                        <div class="card">
                            <div class="card-header bg-light" data-toggle="collapse" data-target="#datospaciented" aria-expanded="false">
                                <h3 class="card-title">Editar información del consultante</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool collapsed" data-card-widget="collapse" title="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body  m-0 p-3" id="datospaciented">
                                <div class="form-row pt-4">
                                    <!-- 
                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="nombrec">Nombre:</label>
                                        <input type="text" class="form-control" id="nombrecita" name="nombrecita"
                                            >
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="emailc">Email:</label>
                                        <input type="email" class="form-control" id="emailc" name="emailc"
                                            >
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="celularc">Celular Principal:</label>
                                        <input type="text" class="form-control" id="celularc" name="celularc"
                                            >
                                    </div>
                                 
                                  -->
                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="fecha_naci">Fecha de Nacimiento*:</label>
                                        <input type="date" class="form-control" id="fecha_nacie" name="fecha_nacie">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="genero">Sexo*:</label>
                                        <select class="form-control" id="generoe" name="generoe">
                                            <option value="HOMBRE">HOMBRE</option>
                                            <option value="MUJER">MUJER</option>
                                            <option value="OTRO">OTRO</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="edad">Edad:</label>
                                        <input type="number" class="form-control" id="edade" name="edad">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="grado">Grado:(niño/niña)</label>
                                        <input type="text" class="form-control" onkeyup="mayupaciente(this)" id="gradoe" name="gradoe">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="lugar_estudio">Lugar de Estudio:(niño/niña) </label>
                                        <input type="text" class="form-control" onkeyup="mayupaciente(this)" id="lugar_estudioe" name="lugar_estudioe">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="ocupacion">Ocupación*:</label>
                                        <input type="text" class="form-control" onkeyup="mayupaciente(this)" id="ocupacione" name="ocupacione">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                        <label for="dirrecione">Dirreción*:</label>
                                        <input id="direccione" name="direccione" onkeyup="mayupaciente(this)" class="form-control ">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="nivel_educativo">Nivel Educativo*:</label>
                                        <input type="text" class="form-control" onkeyup="mayupaciente(this)" id="nivel_educativoe" name="nivel_educativoe">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="departamento">Departamento*:</label>
                                        <select class="form-control" onkeyup="mayupaciente(this)" name="departamentoe" id="departamentoe">
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
                                        <select id="municipioed" name="municipioed" onkeyup="mayupaciente(this)" class="form-control ">
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                        <label for="celular_dos">Celular Dos:</label>
                                        <input type="text" class="form-control" id="celular_dose" name="celular_dose">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                        <label for="celular_tres">Celular Tres:</label>
                                        <input type="text" class="form-control" id="celular_trese" name="celular_trese">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                        <label for="nu_hermano">Numero de Hermanos:</label>
                                        <input type="text" class="form-control" id="nu_hermanoe" name="nu_hermanoe">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                        <label for="lugar_ocupa">Lugar que Ocupa hermanos/as:</label>
                                        <input type="text" class="form-control" id="lugar_ocupae" name="lugar_ocupae">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                        <label for="nu_hijo">Numero de Hijos:</label>
                                        <input type="number" class="form-control" id="nu_hijoe" name="nu_hijoe">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                        <label for="edad_hijo">Edades Hijos:</label>
                                        <input type="text" class="form-control" id="edad_hijoe" name="edad_hijoe">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                        <label for="ano_casado">Años de Casado</label>
                                        <input type="number" class="form-control" id="ano_casadoe" name="ano_casadoe">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 lass="text-center mt-2"><strong> Datos Familiares </strong></h4>
                    <h5 class="text-center mt-2"><strong> Datos de la Madre </strong></h5>
                    <!-- input de familiares ---madre--- -->
                    <div class="card">
                        <div class="card-header bg-light" data-toggle="collapse" data-target="#datosMadred" aria-expanded="false">
                            <h3 class="card-title">Ingresar Datos de la Madre</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool collapsed" data-card-widget="collapse" title="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body collapse m-0 p-3" id="datosMadred">
                            <div class="form-row pt-4">
                                <hr>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="nombre_madre">Nombre Madre:</label>
                                    <input type="text" class="form-control" onkeyup="mayupaciente(this)" id="nombre_madree" name="nombre_madree">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="edad_madre">Edad madre:</label>
                                    <input type="number" class="form-control" id="edad_madree" name="edad_madree">
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label for="estado_civilm">Estado Civil madre:</label>
                                    <select class="form-control" onkeyup="mayupaciente(this)" id="estado_civilme" name="estado_civilme">
                                        <option value="--">***</option>
                                        <option value="soltera">SOlTERA</option>
                                        <option value="casada">CASADA</option>
                                        <option value="acompañada">ACOMPAÑADA</option>
                                        <option value="viuda">VIUDA</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="nivel_educativom">Nivel Educativo Madre:</label>
                                    <input type="text" onkeyup="mayupaciente(this)" class="form-control" id="nivel_educativome" name="nivel_educativome">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="ocupacionm">Ocupacion Madre:</label>
                                    <input type="text" class="form-control" onkeyup="mayupaciente(this)" id="ocupacionme" name="ocupacionme">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="duim">Dui Madre:</label>
                                    <input type="text" class="form-control" id="duime" name="duime">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="vivem">Vive con Madre:</label>
                                    <select class="form-control" onkeyup="mayupaciente(this)" id="viveme" name="viveme">
                                        <option value="">---</option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="notam">Nota:</label>
                                    <textarea class="form-control" id="notame" name="notame"></textarea>
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="viveaunm">Vive su madre Aun?:</label>
                                    <select class="form-control" onkeyup="mayupaciente(this)" id="viveaunme" name="viveaunme">
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
                        <div class="card-header bg-light" data-toggle="collapse" data-target="#datosPadred" aria-expanded="false">
                            <h3 class="card-title">Ingresar Datos del Padre</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool collapsed" data-card-widget="collapse" title="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body collapse m-0 p-3" id="datosPadred">
                            <div class="form-row pt-4">
                                <hr>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="nombrep">Nombre Padre:</label>
                                    <input type="text" class="form-control" onkeyup="mayupaciente(this)" id="nombrepe" name="nombrepe">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="edadp">Edad Padre:</label>
                                    <input type="number" class="form-control" id="edadpe" name="edadpe">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="estado_civilp">Estado Civil Padre:</label>
                                    <select class="form-control" onkeyup="mayupaciente(this)" id="estado_civilpe" name="estado_civilpe">
                                        <option value="***">***</option>
                                        <option value="soltero">SOLTERO</option>
                                        <option value="casado">CASADO</option>
                                        <option value="acompañado">ACOMPAÑADO</option>
                                        <option value="viudo">VIUDO</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="ocupacionp">Ocupacion Padre:</label>
                                    <input type="text" class="form-control" onkeyup="mayupaciente(this)" id="ocupacionpe" name="ocupacionpe">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="nivel_educativop">Nivel Educativo Padre:</label>
                                    <input type="text" class="form-control" onkeyup="mayupaciente(this)" id="nivel_educativope" name="nivel_educativope">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="duip">Dui Padre:</label>
                                    <input type="text" class="form-control" id="duipe" name="duipe">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="viveaunp">Vive su Padre?</label>
                                    <select type="text" class="form-control" id="viveaunpe" name="viveaunpe">
                                        <option value="--">---</option>
                                        <option value="NO">NO</option>
                                        <option value="SI">SI</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="notap">Nota:</label>
                                    <textarea class="form-control" id="notape" name="notape"></textarea>
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="vivep">Vive con su Padre: si/no</label>
                                    <select type="text" class="form-control" onkeyup="mayupaciente(this)" id="vivepe" name="vivepe">
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
                        <div class="card-header bg-light" data-toggle="collapse" data-target="#datosConyuged" aria-expanded="false">
                            <h3 class="card-title">Ingresar datos del Conyuge</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool collapsed" data-card-widget="collapse" title="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>

                            </div>
                        </div>
                        <div class="card-body collapse m-0 p-3" id="datosConyuged">
                            <div class="form-row pt-4">
                                <hr>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="nombrec">Nombre Conyuge:</label>
                                    <input type="text" class="form-control" onkeyup="mayupaciente(this)" id="nombrece" name="nombrece">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="edadc">Edad Conyuge:</label>
                                    <input type="number" class="form-control" id="edadce" name="edadce">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="ocupacionc">Ocupacion Conyuge:</label>
                                    <input type="text" class="form-control" onkeyup="mayupaciente(this)" id="ocupacionce" name="ocupacionce">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="nivel_educativoc">Nivel educativo Conyuge:</label>
                                    <input type="text" class="form-control" onkeyup="mayupaciente(this)" id="nivel_educativoce" name="nivel_educativoce">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="notace">Nota:</label>
                                    <textarea class="form-control" id="notace" name="notace"></textarea>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- input de responsable -->
                    <h5 class="text-center mt-2"><strong>Datos del Responsable </strong></h5>
                    <div class="card">
                        <div class="card-header bg-light " data-toggle="collapse" data-target="#datosResponsabled" aria-expanded="false">
                            <h3 class="card-title">Ingresar Datos del Responsable</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool collapsed" data-card-widget="collapse" title="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>

                            </div>
                        </div>
                        <div class="card-body collapse m-0 p-3" id="datosResponsabled">
                            <div class="form-row pt-4">
                                <hr>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="nombrer">Nombre Resonsable:</label>
                                    <input type="text" class="form-control" id="nombrere" onkeyup="mayupaciente(this)" name="nombrere">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="edadr">Edad Responsable:</label>
                                    <input type="number" class="form-control" id="edadre" name="edadre">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="ocupacionr">Ocupacion Responsable:</label>
                                    <input type="text" class="form-control" id="ocupacionre" onkeyup="mayupaciente(this)" name="ocupacionre">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="nivel_educativor">Nivel educativo Responsable:</label>
                                    <input type="text" class="form-control" onkeyup="mayupaciente(this)" id="nivel_educativore" name="nivel_educativore">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="estado_civilr">Estado Civil Responsable:</label>
                                    <select class="form-control" onkeyup="mayupaciente(this)" id="estado_civilre" name="estado_civilre">
                                        <option value="soltero">---</option>
                                        <option value="soltero">Soltero</option>
                                        <option value="casado">Casado</option>
                                        <option value="acompañado">Acompañado</option>
                                        <option value="viudo">Viudo</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="duir">Dui Responsable:</label>
                                    <input type="text" class="form-control" name="duire" id="duire">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <h5 class="text-center mt-2"> <strong>Datos Antecedentes de Salud </strong> </h5>
                    <div class="card">
                        <div class="card-header bg-light" data-toggle="collapse" data-target="#datosAntecedentesd" aria-expanded="false">
                            <h3 class="card-title">Ingresar datos antecedentes de salud</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool collapsed" data-card-widget="collapse" title="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body collapse m-0 p-3" id="datosAntecedentesd">
                            <div class="form-row pt-4">
                                <hr>
                                <div class="form-group col-sm-12 col-md-6 col-xl-4">
                                    <label for="patologias">Enfermedades Crónicas Hospitalizaciones:</label>
                                    <textarea class="form-control" id="patologiase" onkeyup="mayupaciente(this)" name="patologiase"></textarea>
                                </div>
                                <div class="form-group col-sm-12 col-md-6 col-xl-4">
                                    <label for="enfergenetica">Enfermedades Crónicas, Genéticas de importancia de
                                        familiares:</label>
                                    <textarea class="form-control" id="enfergeneticae" onkeyup="mayupaciente(this)" name="enfergeneticae"></textarea>
                                </div>
                                <div class="form-group col-sm-12 col-md-6 col-xl-4">
                                    <label for="otros">Otras:</label>
                                    <textarea class="form-control" id="otrose" onkeyup="mayupaciente(this)" name="otrose"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 class="text-center mt-2"> <strong>Datos Antecedentes Laborales </strong> </h5>
                    <div class="card">
                        <div class="card-header bg-light" data-toggle="collapse" data-target="#datosLaboralesd" aria-expanded="false">

                            <h3 class="card-title">Ingresar datos antecedentes laborales</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool collapsed" data-card-widget="collapse" title="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>

                            </div>

                        </div>
                        <div class="card-body collapse m-0 p-3" id="#datosLaboralesd">
                            <div class="form-row pt-4">

                                <hr>

                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="iniciotrabajar">Edad en la que inicio a trabajar:</label>
                                    <input type="text" class="form-control" id="iniciotrabajare" onkeyup="mayupaciente(this)" name="iniciotrabajare">
                                </div>

                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="trabaja">Nunca ha trabajado: si/no</label>
                                    <select type="text" class="form-control" onkeyup="mayupaciente(this)" id="trabajae" name="trabajae">
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </div>



                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="trabaja_actualmente">Trabaja Actualmente: si/no</label>
                                    <select type="text" class="form-control" onkeyup="mayupaciente(this)" id="trabaja_actualmentee" name="trabaja_actualmentee">
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </div>




                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="duracion_empleo">Duración de los ultimos empleos: </label>
                                    <input type="text" class="form-control" onkeyup="mayupaciente(this)" id="duracion_empleoe" name="duracion_empleoe">
                                </div>





                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="despedido">¿Ha sido despedido?: si/no</label>
                                    <select type="text" class="form-control" onkeyup="mayupaciente(this)" id="despedidoe" name="despedidoe">
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </div>



                                <div class="form-group col-sm-12 col-md-6 col-xl-4">
                                    <label for="causa">Causas por las cuales fue despedida:</label>
                                    <textarea class="form-control" id="causae" onkeyup="mayupaciente(this)" name="causae"></textarea>
                                </div>

                                <div class="form-group col-sm-12 col-md-6 col-xl-4">
                                    <label for="satisfecho">Satisfecho con trayectoria laboral:</label>
                                    <textarea class="form-control" id="satisfechoe" onkeyup="mayupaciente(this)" name="satisfechoe"></textarea>
                                </div>


                            </div>

                        </div>
                    </div>
                    <!--  codigo de tratamientos previos -->
                    <h5 class="text-center mt-2"> <strong>Tratamientos Previos </strong> </h5>

                    <div class="card">
                        <div class="card-header bg-light" data-toggle="collapse" data-target="#datosTratamientosd" aria-expanded="false">

                            <h3 class="card-title">Ingresar datos de tratamientos previos de salud</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool collapsed" data-card-widget="collapse" title="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body collapse m-0 p-3" id="datosTratamientosd">
                            <div class="form-row pt-4">
                                <hr>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="atencioncnsm">Ha Recibido Tratameinto Psicológico: si/no</label>
                                    <select type="text" class="form-control" onkeyup="mayupaciente(this)" id="atencioncnsme" name="atencioncnsme">
                                        <option value="--">--</option>
                                        <option value="NO">NO</option>
                                        <option value="SI">SI</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="tratamientos">Que tipo de tratamiento ha recibido:</label>
                                    <select type="text" class="form-control" onkeyup="mayupaciente(this)" id="tratamientose" name="tratamientose">
                                        <option value="NO">NINGUNO</option>
                                        <option value="OTROS">OTROS</option>
                                        <option value="PSICOLOGÍCO">PSICOLOGÍCO</option>
                                        <option value="PSIQUIÁTRICO">PSIQUIÁTRICO</option>
                                        <option value="NEUROLOGÍCO">NEUROLOGÍCO</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="nombreatendio">Nombre De terapeuta atendio:</label>
                                    <input type="text" class="form-control" id="nombreatendioe" onkeyup="mayupaciente(this)" name="nombreatendioe">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="direcionatendio">Dirección terapeuta atendio:</label>
                                    <input type="text" class="form-control" id="direcionatendioe" onkeyup="mayupaciente(this)" name="direcionatendioe">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                                    <label for="telefonoatendio">Telefono Terapeuta Atendio:</label>
                                    <input type="text" class="form-control" id="telefonoatendioe" onkeyup="mayupaciente(this)" name="telefonoatendioe">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  codigo de tratamientos recibidos -->
                    <h5 class="text-center mt-2"> <strong>Tratamientos Recibidos </strong> </h5>
                    <div class="card">
                        <div class="card-header bg-light" data-toggle="collapse" data-target="#datosrecibidosd" aria-expanded="false">
                            <h3 class="card-title">Ingresar Datos de Tratamientos Recibidos</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool collapsed" data-card-widget="collapse" title="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body collapse m-0 p-3" id="datosRecibidosd">
                            <div class="form-row pt-4">
                                <hr>
                                <div class="form-group col-sm-12 col-md-4 col-xl-6">
                                    <label for="tratamientorec">Tratamientos Recibidos:</label>
                                    <textarea class="form-control" id="tratamientorece" name="tratamientorece"></textarea>
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-6">
                                    <label for="tipofarmaco">Tipo Farmaco a Consumido:</label>
                                    <input type="text" class="form-control" id="tipofarmacoe" onkeyup="mayupaciente(this)" name="tipofarmacoe">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  codigo de sustancias --->
                    <h5 class="text-center mt-2"> <strong>Consumo de Sustancias y Addiciones </strong> </h5>
                    <div class="card">
                        <div class="card-header bg-light" data-toggle="collapse" data-target="#sustanciasd" aria-expanded="false">

                            <h3 class="card-title">Ingresar datos de consumo de sustancia y addiciones</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool collapsed" data-card-widget="collapse" title="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>

                            </div>

                        </div>
                        <div class="card-body collapse m-0 p-3" id="sustanciasd">
                            <div class="form-row pt-4">
                                <hr>


                                <div class="form-group col-sm-12 col-md-6 col-xl-6">
                                    <label for="tipo_sustancia">Tipo de Sustancia Consumida:</label>
                                    <input type="text" class="form-control" id="tipo_sustanciae" onkeyup="mayupaciente(this)" name="tipo_sustanciae">
                                </div>





                                <div class="form-group col-sm-12 col-md-6 col-xl-6">
                                    <label for="tiempo_consumo">Tiempo de Consumo:</label>
                                    <input type="text" class="form-control" id="tiempo_consumoe" onkeyup="mayupaciente(this)" name="tiempo_consumoe">
                                </div>


                                <div class="form-group col-sm-12 col-md-6 col-xl-6">
                                    <label for="adicion">Adicciones:</label>
                                    <textarea class="form-control" id="adicione" onkeyup="mayupaciente(this)" name="adicione"></textarea>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-success btn-lg" id="">
                        <i class="fas fa-save"></i> Actualizar
                    </button>

                </div>
        </div>
        </form>
    </div>
</div>
</div>
