<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Asegúrate de importar la clase DB
use App\Models\Cita; // Asegúrate de importar el modelo Cita
use App\Models\Consultas; // Asegúrate de importar el modelo Consultas
use Carbon\Carbon;
use App\Models\User; //De donde obtengo el tipo de usuario que es terapeuta
use App\Models\Paciente; // De donde obtengo el genero de los pacientes

class ChartController extends Controller
{
    public function index()
    {
        // Obtener todas las citas
        $citas = Cita::all();

        // Filtrar las citas por año y mes y contar el número de citas por mes
        $citasPorMes = $citas->groupBy(function ($date) {
            return Carbon::parse($date->fecha)->format('m'); // Agrupa solo por mes
        })->map(function ($citas, $mes) {
            return $citas->count();
        });

        // Obtener los nombres de los meses en orden
        $meses = [
            '01' => 'Enero',
            '02' => 'Febrero',
            '03' => 'Marzo',
            '04' => 'Abril',
            '05' => 'Mayo',
            '06' => 'Junio',
            '07' => 'Julio',
            '08' => 'Agosto',
            '09' => 'Septiembre',
            '10' => 'Octubre',
            '11' => 'Noviembre',
            '12' => 'Diciembre'
        ];

        // Obtener el número de citas por mes y asignar cero si no hay citas
        $datos = [];
        foreach ($meses as $numeroMes => $nombreMes) {
            $datos[$nombreMes] = $citasPorMes->get($numeroMes, 0);
        }

        // Código para obtener los últimos 10 terapeutas con sus respectivas consultas
        $terapeutasConConsultas = User::where('categoria', 'terapeuta')
            ->with([
                'consultas' => function ($query) {
                    $query->latest();
                }
            ])
            ->take(10)
            ->get();

        // Obtener la distribución de género de los pacientes
        $generoPacientes = Paciente::select('genero', DB::raw('count(*) as total'))
            ->groupBy('genero')
            ->get()
            ->pluck('total', 'genero');

        $totalUsuarios = User::count();
        $terapeutas = User::where('categoria', 'terapeuta')->count(); // Cambio aquí

        // Pasar los datos a la vista
        return view("graficos.index", compact('citasPorMes', 'meses', 'datos', 'terapeutasConConsultas', 'generoPacientes','totalUsuarios','terapeutas'));


    }




}


