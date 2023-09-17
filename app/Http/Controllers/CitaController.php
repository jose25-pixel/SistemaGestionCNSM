<?php

namespace App\Http\Controllers;
use App\Models\Cita;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;


class CitaController extends Controller
{
    public function index(){
        return view('citas.index');
    }

    public function guardarCita(Request $request)
    {    
       //Manejar los estados de la cita
       //Estado == 0 : Cita creada
       // Estado == 1: El paciente ya se realizo la consulta
       //Inserted 
       $data = [
        'paciente' => trim(request()->input('paciente')),
        'dui' => request()->input('dui'),
        'celular' => request()->input('celular'),
        'fecha' => request()->input('fecha'),
        'hora' => request()->input('hora'),
        'email' => trim(request()->input('email')),
        'motivo' => request()->input('motivo'),
        'estado_cita' => 0
       ];
       Cita::create($data);
       return response()->json([
        'status' => 'inserted',
        'data' => ''
       ]);
       
    }
    //Verificar disponibilida hora
    public function disponibilidaHora(){
        $fecha = request()->input('fecha');
        $data = DB::select("SELECT COUNT(id) as cantidad_cita,fecha,hora FROM `citas` WHERE fecha = ? GROUP BY fecha,hora",[$fecha]);
        return response()->json($data);
    }
    //Obtener la cantidad de citas por fecha
    public function getCountDateCita(){
        $data = DB::select("SELECT COUNT(id) as cantidad_citas,fecha FROM `citas` GROUP BY fecha;");
        return response()->json($data);
    }
    /**
     * DATATABLE
     */
    public function getCitasPaciDT($fecha){
        $citas = Cita::where('fecha','=',$fecha)->orderBy('id','desc')->get();
        $data = [];
        foreach($citas as $row){
            $array = [];
            $array[] = $row->id;
            $array[] = $row->paciente; 
            $array[] = $row->dui;
            $array[] = $row->celular;
            $array[] = date('d-m-Y',strtotime($row->fecha)) . " ". $row->hora;
            $array[] = '<button class="btn btn-xs btn-outline-info"><i class="fas fa-edit"></i></button>';
            $data[] = $array;
        }
        $response = array(
            "data" => $data,
            "recordsTotal" => count($data),
            "recordsFiltered" => count($data)
        );
        return response()->json($response);
    }
    //Validation si existe el DUI
    public function validationDUICita(){
        $dui = request()->input('dui');
        $exists = Cita::where('dui','=',$dui)->exists();
        if($exists){
            return response()->json([
                'status' => 'exists'
            ]);
        }
        return response()->json([
            'status' => 'not-data'
        ]);
    }
}


