<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de los datos del paciente {{ $paciente->paciente }}</title>
</head>


<style>
    body {
        font-family: 'Courier New', Courier, monospace;
        font-size: 15px;
        margin-top: 182px;
        margin-bottom: 43px;
        padding: 5px;
        padding-bottom: 2px;
        padding-top: 3px;

    }

    @page {
        margin: 0.5cm;
    }

    .header {
        position: fixed;
        top: 0cm;
        left: 0cm;
        right: 0cm;
        height: 4.6cm;
    }

    .container {
        width: 100%;
        height: 62px;
        border-bottom: rgb(144, 140, 140) 2px solid;
    }

    .contenedor1 {
        width: 25%;
        float: left;
    }

    img {
        width: 70%;
        height: 57px;
        margin-top: 3px;
        margin-left: 80px;
    }

    .contenedor2 {
        width: 65%;
        height: 58px;
        text-align: center;
        float: right;
    }

    .titulo {
        margin: 10px;
    }

    .nombre {
        margin: 5px 10px 3px 2px;
    }

    .medicamentos {
        text-align: center;
    }

    section {
        clear: unset;
        margin-top: 20px;
        margin-bottom: 30px;
    }

    .cm {
        height: 70px;
        text-align: center;
        margin-left: 10px;
    }

    .table {
        display: table;
        width: 100%;
        max-width: 100%;
        margin-bottom: 9px;
        background-color: transparent;
        border-collapse: collapse;
        border: 1px solid #a2a7a7;

    }

    .tables {

        display: table;
        width: 100%;
        max-width: 100%;
        margin-bottom: 9px;
        background-color: transparent;
        border-collapse: collapse;

    }

    .tablet {

        display: table;
        width: 100%;
        max-width: 100%;
        margin-bottom: 9px;
        background-color: transparent;
        border-collapse: collapse;

    }

    thead {
        display: table-header-group;
        vertical-align: middle;
        border-color: inherit;
        text-align: center;
        color: rgb(5, 5, 5);

        background-color: rgba(12, 12, 12, 0.3);

        border: 1px solid black;
    }

    tr {
        display: table-row;
        vertical-align: inherit;
        border-color: inherit;
    }

    .table th,
    .table td {
        padding: 1px;
        vertical-align: top;
        border-top: 1px solid #a1a5a7;
        text-align: center;
        /* Alinea el texto al centro en las celdas de encabezado y datos */
        vertical-align: middle;
    }

    .table thead th {
        vertical-align: bottom;
        border-top: 1px solid #bec6c9;
    }

    .table-bordered thead th,
    .table-bordered thead td {
        border-bottom-width: 2px;
    }

    .table-bordered th,
    .table-bordered td {
        border: 1px solid #c2cfd6;
    }

    th,
    td {
        display: table-cell;
        vertical-align: inherit;
        border: 1px solid black;
    }

    th {
        font-weight: bold;
        text-align: -internal-center;
        text-align: left;
        border: 1px solid black;
    }

    tbody {
        display: table-row-group;
        vertical-align: middle;
        border-color: inherit;
    }

    tr {
        display: table-row;
        vertical-align: inherit;
        border-color: inherit;
        border: 1px solid black;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
    }

    footer {
        position: fixed;
        bottom: 0cm;
        left: 0cm;
        right: 0cm;
        height: 1cm;
        color: black;

        text-align: center;
        line-height: 0.5cm;

    }

    .pag:after {
        content: counter(page, disc);
    }

</style>


<body>
    <div class="header">
        <div class="container">
            <div class="contenedor1">
                <img src="img/logocsnm.jpeg" alt="">
            </div>

            <div class="contenedor2">
                <h3 class="titulo">Comíte Nacional de Salud Mental</h3>
                <h3 class="nombre">(CNSM)</h3>
            </div>
        </div>

        <div class="medicamentos">
            <h4>Datos personales del consultante
                <?php echo date("Y");?>
            </h4>
            <!-- codigo de los datos personales del paciente -->

            <div class="cm">

                <table class="table table-responsive table-borderless">
                    <thead>
                        <tr>
                            <th scope="col-sm-4">Nombre</th>

                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td> {{$paciente->paciente}} </td>


                            </td>
                        </tr>

                    </tbody>
                </table>

            </div>
            <div class="cm">

                <table class="table table-responsive table-borderless">
                    <thead>
                        <tr>
                            <th scope="col-sm-4">Dui</th>
                            <th scope="col-sm-4">Correo</th>
                            <th scope="col-sm-4">Celular1</th>
                            <th scope="col-sm-4">Codigo_clinico</th>
                            <th scope="col-sm-4">Fecha_nacimiento</th>
                            <th scope="col-sm-4">Edad</th>


                        </tr>
                    </thead>
                    <tbody>

                        <tr>

                            <td> {{$paciente->dui}} </td>
                            <td> {{$paciente->email}} </td>
                            <td> {{$paciente->celular}} </td>
                            <td> {{$paciente->cod_paciente}} </td>
                            <td>{{\Carbon\Carbon::parse($paciente->fecha_naci)->formatLocalized("%d/%B/%Y") }}</td>

                            <td> {{$paciente->edad}} </td>

                            </td>
                        </tr>

                    </tbody>
                </table>

            </div>


            <div class="cm">
                <table class="table table-responsive table-borderless">
                    <thead>
                        <tr>
                            <th scope="col-sm-4">Genero</th>
                            <th scope="col-sm-4">Ocupación</th>
                            <th scope="col-sm-4">lugar_estudio</th>
                            <th scope="col-sm-4">Grado</th>
                            <th scope="col-sm-4">Nivel_Educativo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> {{$paciente->genero}} </td>
                            <td> {{$paciente->ocupacion}} </td>
                            <td> {{$paciente->lugar_estudio}} </td>
                            <td> {{$paciente->grado}} </td>
                            <td> {{$paciente->nivel_educativo }}</td>


                            </td>
                        </tr>

                    </tbody>
                </table>

            </div>

            <div class="cm">

                <table class="table table-responsive table-borderless">
                    <thead>
                        <tr>


                            <th scope="col-sm-4">Dirección</th>
                            <th scope="col-sm-4">Departamento</th>
                            <th scope="col-sm-4">Municipio</th>



                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td> {{$paciente->direccion}} </td>
                            <td> {{$paciente->departamento}} </td>
                            <td> {{$paciente->municipio}} </td>
                            </td>
                        </tr>

                    </tbody>
                </table>

            </div>
            <div class="cm">

                <table class="table table-responsive table-borderless">
                    <thead>
                        <tr>


                            <th scope="col-sm-4">Celular Dos</th>
                            <th scope="col-sm-4">Celular Tres</th>
                            <th scope="col-sm-4">Numero_hermanos</th>
                            <th scope="col-sm-4">Lugar Ocupa</th>
                            <th scope="col-sm-4">Numero Hijos</th>
                            <th scope="col-sm-4">Edad Hijos</th>
                            <th scope="col-sm-4">Años Casado</th>



                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td> {{$paciente->celular_dos}} </td>
                            <td> {{$paciente->celular_tres}} </td>
                            <td> {{$paciente->nu_hermano}} </td>
                            <td> {{$paciente->lugar_ocupa}} </td>
                            <td> {{$paciente->nu_hijo}} </td>
                            <td> {{$paciente->edad_hijo}} </td>
                            <td> {{$paciente->ano_casado}} </td>
                            </td>
                        </tr>

                    </tbody>
                </table>

            </div>
            <h3>Datos de familiares del consultante</h3>
            <h4>Datos de la madre</h4>


            <!-- codigo de los familiares del Consultante -->
            <div class="cm">
                <table class="table table-responsive table-borderless">
                    <thead>
                        <tr>
                            <th scope="col-sm-4">Nombre madre</th>
                            <th scope="col-sm-4">Edad Madre</th>
                            <th scope="col-sm-4">Estado Civil</th>
                            <th scope="col-sm-4">Nivel Educativo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> {{$parentesco->nombre_madre}} </td>
                            <td> {{$parentesco->edad_madre}} </td>
                            <td> {{$parentesco->estado_civilm}} </td>
                            <td> {{$parentesco->nivel_educativom}} </td>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="cm">
                <table class="table table-responsive table-borderless">
                    <thead>
                        <tr>
                            <th scope="col-sm-4">Cocupación</th>
                            <th scope="col-sm-4">Vive con su Madre</th>
                            <th scope="col-sm-4">Dui madre</th>
                            <th scope="col-sm-4">Vive su madre</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> {{$parentesco->ocupacionm}} </td>
                            <td> {{$parentesco->vivem}} </td>
                            <td> {{$parentesco->duim}} </td>
                            <td> {{$parentesco->viveaunm}} </td>


                        </tr>
                    </tbody>
                </table>
                <table class="table table-responsive table-borderless">
                    <thead>
                        <tr>
                            <th scope="col-sm-4">Comentario</th>


                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> {{$parentesco->notam}} </td>

                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- codigo de los familiares del consultante Padre -->
            <h4>Datos del padre</h4>



            <div class="cm">


                <table class="table table-responsive table-borderless">
                    <thead>
                        <tr>
                            <th scope="col-sm-4">Nombre</th>
                            <th scope="col-sm-4">Edad</th>
                            <th scope="col-sm-4">Estado Civil</th>
                            <th scope="col-sm-4">Ocupacion</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> {{$parentesco->nombrep}} </td>
                            <td> {{$parentesco->vivep}} </td>
                            <td> {{$parentesco->estado_civilp}} </td>
                            <td> {{$parentesco->ocupacionp}} </td>


                        </tr>
                    </tbody>

                </table>


            </div>
            <div class="cm">


                <table class="table table-responsive table-borderless">
                    <thead>
                        <tr>
                            <th scope="col-sm-4">Nivel Educativo</th>
                            <th scope="col-sm-4">Vive con su padre</th>
                            <th scope="col-sm-4">Dui</th>
                            <th scope="col-sm-4">vive aun su padre</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> {{$parentesco->nivel_educativop}} </td>
                            <td> {{$parentesco->vivep}} </td>
                            <td> {{$parentesco->duip}} </td>
                            <td> {{$parentesco->viveaunp}} </td>


                        </tr>
                    </tbody>
                </table>
                <table class="table table-responsive table-borderless">
                    <thead>
                        <tr>
                            <th scope="col-sm-4">Comentario</th>


                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> {{$parentesco->notap}} </td>

                        </tr>
                    </tbody>
                </table>
            </div>

            <h3>Datos del conyuge</h3>

            <div class="cm">


                <table class="table table-responsive table-borderless">
                    <thead>
                        <tr>
                            <th scope="col-sm-4">Nombre</th>
                            <th scope="col-sm-4">Nivel Educativo</th>
                            <th scope="col-sm-4">Ocupacion</th>
                            <th scope="col-sm-4">edad</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> {{$conyuge->nombre}} </td>
                            <td> {{$conyuge->nivel_educativo}} </td>
                            <td> {{$conyuge->ocupacion}} </td>
                            <td> {{$conyuge->edad}} </td>
                        </tr>
                    </tbody>

                </table>

                <table class="table table-responsive table-borderless">
                    <thead>
                        <tr>
                            <th scope="col-sm-4">Cmentario</th>


                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> {{$conyuge->notac}} </td>

                    </tbody>

                </table>
            </div>

            <hr>
            <br>
            <br>

            <div class="cm">


                <table class="table table-responsive table-borderless">
                    <thead>
                        <tr>
                            <th scope="col-sm-4">Nombre</th>
                            <th scope="col-sm-4">Nivel Educativo</th>
                            <th scope="col-sm-4">Ocupacion</th>
                            <th scope="col-sm-4">edad</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> {{$conyuge->nombre}} </td>
                            <td> {{$conyuge->nivel_educativo}} </td>
                            <td> {{$conyuge->ocupacion}} </td>
                            <td> {{$conyuge->edad}} </td>
                        </tr>
                    </tbody>

                </table>

                <table class="table table-responsive table-borderless">
                    <thead>
                        <tr>
                            <th scope="col-sm-4">Cmentario</th>


                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> {{$conyuge->notac}} </td>

                    </tbody>

                </table>
            </div>


            <div class="cm">


                <table class="table table-responsive table-borderless">
                    <thead>
                        <tr>
                            <th scope="col-sm-4">Nombre</th>
                            <th scope="col-sm-4">Nivel Educativo</th>
                            <th scope="col-sm-4">Ocupacion</th>
                            <th scope="col-sm-4">edad</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> {{$conyuge->nombre}} </td>
                            <td> {{$conyuge->nivel_educativo}} </td>
                            <td> {{$conyuge->ocupacion}} </td>
                            <td> {{$conyuge->edad}} </td>
                        </tr>
                    </tbody>

                </table>

                <table class="table table-responsive table-borderless">
                    <thead>
                        <tr>
                            <th scope="col-sm-4">Cmentario</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> {{$conyuge->notac}} </td>

                    </tbody>

                </table>
            </div>


        </div>
    </div>




    <main>




    </main>

    <!--  <footer>
        <p class="pag">Datos generales del cosultante-
            <?php echo date("Y");?>
            Pagína
        </p>
    </footer> --
</body>

</html>
