<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de consulta</title>
</head>


<style>
    body {
        /* font-family: 'Courier New', Courier, monospace;-->*/
        font-family: 'Century Gothic', sans-serif;
        font-size: 13px;
        margin-top: 20px;
        margin-bottom: 43px;
        padding: 5px;
        padding-bottom: 2px;
        padding-top: 3px;

    }

    @page {
        margin: 0.5cm;
    }

    .header {
        /* position: fixed;*/
        top: 0cm;
        left: 0cm;
        right: 0cm;
        height: 2.8cm;
        z-index: 1000;
        /*
    }

    .container {
        width: 100%;
        height: 62px;
        /* border-bottom: rgb(231, 24, 24) 2px solid;*/
    }

    .contenedor1 {
        margin-top: 4px;

        height: 28%;
        float: left;
        /*        background-color: red;*/
    }

    img {
        width: 60%;
        height: 90px;
        margin-top: 3px;
        margin-left: 30px;
    }

    .contenedor2 {
        margin-top: 12px;
        width: 75%;
        height: 90px;
        text-align: left;
        float: left;
        display: flex;
        flex-direction: column;
        /* Asegura que los elementos se apilen verticalmente */
        align-items: center;
        margin: 0;
        padding: 0
    }

    .encabezado {
        margin-top: 0px;
        width: 100%;
        height: 11px;
        text-align: left;
        float: left;
        background-color: rgb(18, 18, 202);

    }


    .linea {
        background-color: rgb(18, 18, 202);
    }

    .parafo1 {
        margin-top: 1px;
        font-weight: bold;
        height: 5px;
        font-size: 15px;
        color: black;
    }

    .parafo2 {
        margin-top: 1px;
        height: 4px;
        font-weight: bold;
        font-size: 23px;
        color: black;
    }

    .parrafo3 {

        width: 90%;
        font-size: 10px;
    }

    .medicamentos {

        text-align: center;
        margin-top: 8px;
    }

    section {
        clear: unset;
        margin-top: 0px;
        bottom: 2cm;
        margin-bottom: 0px;
    }

    .cm {
        height: 50px;
        max-width: 100%;
        text-align: center;
        margin-left: 10px;


    }

    .salto-de-pagina {
        page-break-before: always;
    }

    .table {
        display: table;
        width: 100%;
        max-width: 100%;
        margin-bottom: 9px;
        background-color: transparent;
        border-collapse: collapse;
        border: 1px solid #a2a7a7;
        z-index: 1;

    }
    thead {
        display: table-header-group;
        vertical-align: middle;
        border-color: inherit;
        text-align: center;
        color: rgb(5, 5, 5);
        max-width: 50px;
        background-color: rgba(73, 175, 243, 0.3);
    }

    .table th,
    .table td {
        padding: 1px;
        vertical-align: top;
        border: 1px solid #d4d7d8;
        text-align: center;
        padding: 3px;
        /* Alinea el texto al centro en las celdas de encabezado y datos */
        vertical-align: middle;
    }
    footer {
        position: fixed;
        bottom: 0.5cm;
        left: 0cm;
        right: 0cm;
        height: 1.5cm;
        color: black;

        text-align: center;
        line-height: 0.5cm;

    }
</style>


<body>
    <div class="header">
        <div class="container">
            <div class="contenedor1">
                <img src="img/logo.jpg" alt="">
            </div>
            <div class="contenedor2">
                <div class="elemneto">
                    <p class="parafo1">COMÍTE NACIONAL DE </p>
                    <p class="parafo2">SALUD MENTAL</p>
                </div>
                <hr class="linea">
                <div class="encabezado">
                </div>
                <p class="parrafo3"> REPUBLICA DE EL SALVADOR, C.S.S.P. CLÍNICA CENTRO DE SALUD MENTAL, NO. INSCRIP.12,
                    PROPIEDAD DEL COMITÉ NACIONAL DE SALUD MENTAL. </p>
            </div>
        </div>
    </div>
    <section>
        <div class="medicamentos">
            <h4>DATOS DE LA CONSULTA</h4>
            <!-- codigo de los datos personales del paciente -->
            <div class="cm">
                <table class="table table-responsive table-borderless">
                    <thead>
                        <tr>
                            <th scope="col-sm-4">Nº</th>
                            <th scope="col-sm-4">DUI</th>
                            <th scope="col-sm-4">PACIENTE</th>
                            <th scope="col-sm-4">FECHA & HORA</th>
                            <th scope="col-sm-4">MOTIVO DE LA CONSULTA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($consultas as $row)
                        <tr>
                            <td> {{$row->num_clinico}} </td>
                            <td> {{$row->dui}} </td>
                            <td> {{$row->paciente}} </td>
                            <td> {{date('d-m-Y',strtotime($row->fecha)) . ' '. $row->hora}} </td>
                            <td>{{ $row->motivo}}</td>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <h4>SINTOMAS</h4>
                <table class="table table-responsive table-borderless">
                    <thead>
                        <tr>
                            <th scope="col-sm-4">#</th>
                            <th scope="col-sm-4">SINTOMAS</th>
                            <th scope="col-sm-4">CONFLICTOS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $contador = 1;    
                        @endphp
                        @foreach($sintomas as $row)
                        <tr>
                            <td> {{$contador}} </td>
                            <td> {{$row->sintoma}} </td>
                            <td> {{$row->conflicto}} </td>
                            </td>
                        </tr>
                        @php
                            $contador ++;
                        @endphp
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <footer>
        <p>DATOS GENERALES DE {{$consultas[0]->paciente}}</p>
        <p class="pag"> CÓDIGO CLINICO: {{$consultas[0]->cod_paciente}}
            AÑO:
            <?php echo date("Y");?>
            Pagína
        </p>
    </footer>
</body>
</html>