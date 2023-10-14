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
        color: white;
        background-color: #0c0c0c;

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
                            <td> {{$paciente->fecha_naci}} </td>
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
                           


                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td> {{$paciente->celular_dos}} </td>
                            <td> {{$paciente->celular_tres}} </td>
                            <td> {{$paciente->nu_hermano}} </td>
                            <td> {{$paciente->nu_hermano}} </td>
                            </td>
                        </tr>

                    </tbody>
                </table>

            </div>


        </div>
    </div>




    <main>


    </main>

    <footer>
        <p class="pag">CONTROL INTERNO SOBRE EL INVENTARIO DE MEDICAMENTO KARDEX-
            <?php echo date("Y");?>
            Pagína
        </p>
    </footer>
</body>

</html>
