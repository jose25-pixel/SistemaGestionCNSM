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
        $data = DB::select("SELECT COUNT(id) as cantidad_cita,fecha,hora FROM `citas` WHERE fecha = ? and estado_cita='0' GROUP BY fecha,hora",[$fecha]);
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
        $counter = count($citas);
        foreach($citas as $row){
            $array = [];
            $array[] = $counter;
            $array[] = $row->paciente; 
            $array[] = $row->dui;
            $array[] = $row->celular;
            $array[] = date('d-m-Y',strtotime($row->fecha)) . " ". $row->hora;
            $badge = '';
            if($row->estado_cita == 0){
                $badge = '<span style="font-size: 12px" class="badge badge-info">Pendiente</span>';
            } else if ($row->estado_cita == -1){
                $badge = '<span style="font-size: 12px" class="badge badge-danger">Cancelado</span>';
            }else{
                $badge = '<span style="font-size: 12px" class="badge badge-success">Atendido</span>';
            }
            $array[] = $badge;
            $disableBTNCancel = $row->estado_cita == 0 ? "" : "disabled"; 
            $array[] = '<button data-id_cita="'.$row->id.'" onclick="updateCita(this)" class="btn btn-xs btn-outline-info"><i class="fas user-edit"></i>Editar</button>
                        <button '.$disableBTNCancel.' class="btn btn-xs btn-outline-info" onclick="cancelCita(this)" data-id_cita="'.$row->id.'"><i class="fas user-slash"></i> Cancelar</button>';
            $data[] = $array;
            $counter --;
        }
        $response = array(
            "sEcho" => 1, //Información para el datatables
			"iTotalRecords" => count($data), //enviamos el total registros al datatable
			"iTotalDisplayRecords" => count($data), //enviamos el total registros a visualizar
			"aaData" => $data
        );
        return response()->json($response);
    }
    //Validation si existe el DUI
    public function validationDUICita(){
        date_default_timezone_set('America/El_Salvador');
        $dui = request()->input('dui');
        $fechaActual = date('Y-m-d');
        $exists = Cita::where('dui','=',$dui)->where('fecha','=',$fechaActual)->exists();
        if($exists){
            return response()->json([
                'status' => 'exists'
            ]);
        }
        return response()->json([
            'status' => 'not-data'
        ]);
    }
    /**
     * GET LIST General
     */
    public function getListadoGenCita(){
        $citas = Cita::orderBy('id','desc')->get();
        $data = [];
        $contador = count($citas);
        foreach($citas as $row){
            $array = [];
            $array[] = $contador;
            $array[] = $row->paciente; 
            $array[] = $row->dui;
            $array[] = $row->celular;
            $array[] = date('d-m-Y',strtotime($row->fecha)) . " ". $row->hora;
            $array[] = ($row->estado_cita == 0) ? 'Pendiente' : 'Cancelado';
            $array[] = '<button class="btn btn-xs btn-outline-info"><i class="fas fa-edit"></i></button>';
            $data[] = $array;
            $contador --;
        }
        $response = array(
            "sEcho" => 1, //Información para el datatables
			"iTotalRecords" => count($data), //enviamos el total registros al datatable
			"iTotalDisplayRecords" => count($data), //enviamos el total registros a visualizar
			"aaData" => $data
        );
        return response()->json($response);
    }
    //Cancelar cita
    function cancelarCita(){
        $id_cita = request()->input('id_cita');
        Cita::where('id',$id_cita)->update([
            'estado_cita' => -1
        ]);
        return response()->json([
            'status' => 'cancelado',
            'message' => 'La cita se ha cancelado exitosamente!'
        ]);
    }
    //obtener cita
    public function getCitaById(){
        $id_cita = request()->input('id_cita');
        $data = Cita::find($id_cita);
        return response()->json($data);
    }
}


