<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cita; // Asegúrate de importar el modelo Cita
use App\Models\Consultas; // Asegúrate de importar el modelo Consultas
use Carbon\Carbon;

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
    
        // Pasar los datos a la vista
        return view("graficos.index", compact('citasPorMes', 'meses', 'datos'));
    }
    

    
}


/* class ChartController extends Controller
{
    //
    public function index(){
        return view("graficos.index");
    }
}
 */

