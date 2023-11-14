@extends('layouts.app')
@section('content')
<h3>Gráficos</h3>
<!-- Highcharts JS -->
 <script src="https://code.highcharts.com/highcharts.js"></script>

<div class="row">
    <div class="col-lg-3 col-6">
    <!-- small box -->
        <div class="small-box bg-info"> <div class="inner"> <h3>{{ $totalUsuarios }}</h3> <h3>Usuarios</h3> </div>
            <div class="icon">
                <i class="ion-android-contacts text-white"></i>

            </div>
            <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
        </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
        <div class="inner">
            <h3>{{ $terapeutas }}</h3>
            <h3>Terapeutas</h3>
        </div>
        <div class="icon">
            <i class="ion-android-checkmark-circle text-white"></i>
        </div>
        <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
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
    // Supongamos que tienes datos de consultas con terapeutas (obtenidos desde el controlador Laravel)
    var terapeutasConConsultas = {!! json_encode($terapeutasConConsultas) !!};

    // Convertir a un formato que Highcharts pueda entender
    var data = terapeutasConConsultas.map(function (terapeuta) {
        return {
            name: terapeuta.nombre,
            y: terapeuta.consultas.length
        };
    });

    // Configuración de Highcharts para un gráfico de pastel
    Highcharts.chart('grafico2', {
        chart: {
            type: 'pie'
        },
        title: {
            text: 'TOP de Últimos 10 Terapeutas con sus Consultas'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y}',
                    style: {
                        fontSize: '10px' // Ajustar el tamaño de la fuente según sea necesario
                    }
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
        var datosPacientes = {!! json_encode($generoPacientes) !!};

        // Convertir a un formato que Highcharts pueda entender
        var data = Object.keys(datosPacientes).map(function (genero) {
            return {
                name: genero,
                y: datosPacientes[genero]
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
                categories: Object.keys(datosPacientes), // No es necesario especificar categorías adicionales
            },
            yAxis: {
            min: 0,
            title: {
                text: 'Número de Pacientes'
            },
            allowDecimals: false // Configuración para permitir solo números enteros
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
                name: 'Género',
                data: data
            }]
        });
    });

</script>
@endsection