@extends('layouts.app')
@section('content')
<h3>Gráficos</h3>
<!-- Highcharts JS -->
 <script src="https://code.highcharts.com/highcharts.js"></script>

<div class="row">
    <div class="col-lg-3 col-6">
    <!-- small box -->
        <div class="small-box bg-info"> <div class="inner"> <h3>150</h3> <h3>Usuarios</h3> </div>
            <div class="icon">
                <i class="ion-android-contacts text-white"></i>

            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
        <div class="inner">
            <h3>34<sup style="font-size: 20px"></sup></h3>

            <h3>Terapeutas</h3>
        </div>
        <div class="icon">
            <i class="ion-android-checkmark-circle text-white"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- /.row -->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-8 col-lg-6">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div id="grafico1">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-8 col-lg-6">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div id="grafico2">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-8 col-lg-6 mt-3">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div id="grafico3">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<script>
   document.addEventListener('DOMContentLoaded', function () {
    // Obtener datos del controlador
    var datos = {!! json_encode(array_values($datos)) !!};

    // Formatear datos para Highcharts
    var categorias = {!! json_encode(array_keys($meses)) !!};

    // Configuración de Highcharts
    Highcharts.chart('grafico1', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Citas por Mes'
        },
        xAxis: {
            categories: categorias, // Utilizar los nombres de los meses
            title: {
                text: 'Mes'
            }
        },
        yAxis: {
            title: {
                text: 'Número de Citas'
            }
        },
        series: [{
            name: 'Citas',
            data: datos
        }]
    });
});


    document.addEventListener('DOMContentLoaded', function () {
        // Supongamos que tienes datos de consultas con terapeutas
        var datosConsultas = [
            { consulta: 'Consulta 1', terapeuta: 'Terapeuta A' },
            { consulta: 'Consulta 2', terapeuta: 'Terapeuta B' },
            { consulta: 'Consulta 3', terapeuta: 'Terapeuta C' },
            { consulta: 'Consulta 4', terapeuta: 'Terapeuta D' },
            { consulta: 'Consulta 5', terapeuta: 'Terapeuta E' },
            { consulta: 'Consulta 6', terapeuta: 'Terapeuta F' },
            { consulta: 'Consulta 7', terapeuta: 'Terapeuta G' },
            { consulta: 'Consulta 8', terapeuta: 'Terapeuta H' },
            { consulta: 'Consulta 9', terapeuta: 'Terapeuta I' },
            { consulta: 'Consulta 10', terapeuta: 'Terapeuta J' },
            // ... Agrega más datos según sea necesario
        ];

        // Crear un objeto con terapeutas y un número aleatorio de consultas para cada uno
        var terapeutas = {};
        datosConsultas.forEach(function (consulta) {
            if (!terapeutas[consulta.terapeuta]) {
                terapeutas[consulta.terapeuta] = Math.floor(Math.random() * 20) + 1; // Número aleatorio de consultas
            } else {
                terapeutas[consulta.terapeuta]++;
            }
        });

        // Convertir a un formato que Highcharts pueda entender
        var data = Object.keys(terapeutas).map(function (terapeuta) {
            return {
                name: terapeuta,
                y: terapeutas[terapeuta]
            };
        });

        // Configuración de Highcharts para un gráfico de pastel
        Highcharts.chart('grafico2', {
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Top 10 Terapeutas por Consultas'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.y}'
                    }
                }
            },
            series: [{
                name: 'Consultas',
                data: data
            }]
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        // Supongamos que tienes datos de pacientes con información sobre su género
        var datosPacientes = [
            { paciente: 'Paciente 1', genero: 'Masculino' },
            { paciente: 'Paciente 2', genero: 'Femenino' },
            { paciente: 'Paciente 3', genero: 'Masculino' },
            // ... Agrega más datos según sea necesario
        ];

        // Contar la frecuencia de cada género
        var frecuenciaPorGenero = {};

        datosPacientes.forEach(function (paciente) {
            if (!frecuenciaPorGenero[paciente.genero]) {
                frecuenciaPorGenero[paciente.genero] = Math.floor(Math.random() * 20) + 1;;
            } else {
                frecuenciaPorGenero[paciente.genero]++;
            }
        });

        // Convertir a un formato que Highcharts pueda entender
        var data = Object.keys(frecuenciaPorGenero).map(function (genero) {
            return {
                name: genero,
                y: frecuenciaPorGenero[genero]
            };
        });

        // Configuración de Highcharts para un gráfico de barras apiladas
        Highcharts.chart('grafico3', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Género de Pacientes'
            },
            xAxis: {
                categories: ['Género']
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Número de Pacientes'
                }
            },
            legend: {
                reversed: true
            },
            plotOptions: {
                series: {
                    stacking: 'normal'
                }
            },
            series: [{
                name: 'Masculino',
                data: [frecuenciaPorGenero['Masculino'] || 0]
            }, {
                name: 'Femenino',
                data: [frecuenciaPorGenero['Femenino'] || 0]
            }]
        });
    });
</script>
@endsection