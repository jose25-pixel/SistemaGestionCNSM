<?php

namespace App\Http\Controllers;
use App\Models\Cita;
use App\Models\Paciente;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
       $id_usuario = Auth::user()->id;
       $data = [
        'paciente' => trim(request()->input('paciente')),
        'dui' => request()->input('dui'),
        'celular' => request()->input('celular'),
        'fecha' => request()->input('fecha'),
        'hora' => request()->input('hora'),
        'email' => trim(request()->input('email')),
        'motivo' => request()->input('motivo'),
        'estado_cita' => 0,
        'terapeuta_id' => request()->input('terapeuta_id'),
        'usuario_id' => $id_usuario
       ];
     
     
       //$cita = Cita::create($data);
        Cita::create($data);
      
      // $paciente = new Paciente();
       //$paciente->id_cita = $cita->id;
       //$paciente->genero= 'masculino';
       //$paciente->save();


       return response()->json([
        'status' => 'inserted',
        'data' =>   ''
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
        $citas = DB::select("SELECT c.id,c.paciente,c.dui,c.celular,c.fecha,c.hora,
        c.email,c.motivo,c.estado_cita,u.nombre as terapeuta,u.telefono 
        as tel_t FROM `citas` as c INNER join usuarios as u on
         c.terapeuta_id=u.id where c.fecha=? order by c.id desc",[$fecha]);
        $data = [];
        $counter = count($citas);
        foreach($citas as $row){
            $array = [];
            $array[] = $counter;
            $array[] = $row->paciente; 
            $array[] = $row->dui;
            $array[] = $row->celular;
            $array[] = date('d-m-Y',strtotime($row->fecha)) . " ". $row->hora;
            $array[] = $row->terapeuta . " - Tel.".$row->tel_t;
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
            $disableBtnEdit = $row->estado_cita == -1 ? "disabled" : '';
            $array[] = '<button title="Editar cita" '.$disableBtnEdit.' data-id_cita="'.$row->id.'" onclick="updateCita(this)" class="btn btn-xs btn-outline-info"><i class="fas fa-user-edit"></i></button>
                        <button '.$disableBTNCancel.' class="btn btn-xs btn-danger" title="Cancelar cita" onclick="cancelCita(this)" data-id_cita="'.$row->id.'"><i class="fas fa-user-slash"></i></button>
                        <button title="Eliminar cita" class="btn btn-xs btn-outline-danger" onclick="delCita(this)" data-id_cita="'.$row->id.'"><i class="fas fa-trash"></i></button>';
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
        $citas = DB::select("SELECT c.id,c.paciente,c.dui,c.celular,c.fecha,c.hora,c.email,
        c.motivo,c.estado_cita,u.nombre as terapeuta,u.telefono as tel_t FROM `citas`
         as c INNER join usuarios as u on c.terapeuta_id=u.id order by c.id desc");
        $data = [];
        $contador = count($citas);
        foreach($citas as $row){
            $array = [];
            $array[] = $contador;
            $array[] = $row->paciente; 
            $array[] = $row->dui;
            $array[] = $row->celular;
            $array[] = date('d-m-Y',strtotime($row->fecha)) . " ". $row->hora;
            $array[] = $row->terapeuta . " - Tel.".$row->tel_t;
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
            $disableBtnEdit = $row->estado_cita == -1 ? "disabled" : '';
            $array[] = '<button '.$disableBtnEdit.' data-id_cita="'.$row->id.'" onclick="updateCita(this)" class="btn btn-xs btn-outline-info"><i class="fas user-edit"></i>Editar</button>
            <button '.$disableBTNCancel.' class="btn btn-xs btn-danger" onclick="cancelCita(this)" data-id_cita="'.$row->id.'"><i class="fas user-slash"></i> Cancelar</button>';
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
        session(['id_cita' => $id_cita]);
        $data = Cita::find($id_cita);
        return response()->json($data);
    }


    //Actualizar datos de la cita
    public function updateCita(){
        $id_cita = session('id_cita');
        $id_usuario = Auth::user()->id;
        $data = [
            'paciente' => trim(request()->input('paciente')),
            'dui' => request()->input('dui'),
            'celular' => request()->input('celular'),
            'fecha' => request()->input('fecha'),
            'hora' => request()->input('hora'),
            'email' => trim(request()->input('email')),
            'motivo' => request()->input('motivo'),
            'terapeuta_id' => request()->input('terapeuta_id'),
            'usuario_id' => $id_usuario
           ];
        Cita::where('id',$id_cita)->update($data);
        return response()->json([
            'status' => 'update',
            'data' => ''
           ]);
    }
    /**
     * Method para contar la cantidad de citas por dia
     */
    public function getCantidadCitaDay(){
        date_default_timezone_set('America/El_Salvador');
        $day = date('Y-m-d');
        $cantidadCita = Cita::where('fecha',$day)->count();
        return response()->json($cantidadCita);
    }

 

 //Get cits
 public function getCitas(){

   
     $citasp = DB::SELECT("SELECT citas.id, citas.paciente, citas.dui, citas.estado_cita,citas.fecha,citas.hora
    FROM citas
    WHERE citas.id NOT IN (
        SELECT id_cita
        FROM paciente) and estado_cita!='-1'");
    return response()->json($citasp);
}

//Verificacion de datos existentes
    public function verifyExistsCita(){
        $dui = request()->input('dui');
        $exists = Cita::where('dui',$dui)->exists();
        if($exists){
            $cita = Cita::where('dui',$dui)->orderBy('id','desc')->limit(1)->get();
            return response()->json(
                [
                    'status' => 'exists',
                    'message' => '¿Desea carga los datos de este cliente?!',
                    'data' => $cita[0]
                ]);
        }
        return response()->json([
            'status' => 'not-found',
            'message' => 'No existe cita registrado anteriormente!',
            'data' => []
        ]);
    }
    //Eliminar cita

    public function destroyCita(){
        $id = request()->input('id');
        //Validar si existe en paciente
        $valid = Paciente::where('id_cita',$id)->exists();
        if($valid){
            return response()->json([
                'status' => 'not-delete'
            ]);    
        }
        //Delete
        $cita = Cita::find($id);
        $cita->delete();
        return response()->json([
            'status' => 'delete'
        ]);
    }

}


