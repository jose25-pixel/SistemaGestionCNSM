<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Consultas;
use App\Models\Sintomas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class ConsultasController extends Controller
{
    //Vista principal
    public function index(){
        return view('consulta.index');
    }
    public function datatable_consulta(){
        $consulta = DB::select('SELECT c.id,c.num_clinico,c.fecha,c.hora,c.motivo_consulta,c.Genograma,ct.paciente,ct.dui,ct.celular,ct.email,ct.motivo,p.fecha_naci,p.genero,p.direccion FROM `consultas` as c inner join paciente as p on c.paciente_id=p.id inner join citas as ct on p.id_cita=ct.id order by c.id desc');
        $data = [];
        $contador = 1;
        foreach($consulta as $row){
            $array = [];
            $array[] = $contador;
            $array[] = $row->num_clinico; 
            $array[] = $row->dui;
            $array[] = $row->paciente;
            $array[] = date('d-m-Y',strtotime($row->fecha));
            $array[] = $row->hora;
            $array[] = $row->motivo;
            $array[] = '<button data-id_cita="'.$row->id.'" onclick="updateCita(this)" class="btn btn-xs btn-outline-info"><i class="fas user-edit"></i>Editar</button>
            <button class="btn btn-xs btn-danger" onclick="cancelCita(this)" data-id_cita="'.$row->id.'"><i class="fas user-slash"></i> Cancelar</button>';
            $data[] = $array;
            $contador ++;
        }
        $response = array(
            "sEcho" => 1, //Información para el datatables
			"iTotalRecords" => count($data), //enviamos el total registros al datatable
			"iTotalDisplayRecords" => count($data), //enviamos el total registros a visualizar
			"aaData" => $data
        );
        return response()->json($response);
    }
    //Mostrar todos los pacientes en consulta
    public function dt_pacientes(){
        $consulta = DB::select('SELECT p.id,p.cod_paciente,p.fecha_reg,c.paciente,c.dui,c.motivo,c.fecha as fecha_cita,c.celular as telefono FROM `paciente` as p INNER JOIN citas as c on p.id_cita=c.id');
        $data = [];
        $contador = 1;
        foreach($consulta as $row){
            $array = [];
            $array[] = $row->cod_paciente; 
            $array[] = $row->paciente;
            $array[] = $row->dui;
            $array[] = $row->telefono;
            $array[] = date('d-m-Y',strtotime($row->fecha_cita));
            $array[] = '<button data-id_paciente="'.encrypt($row->id).'" onclick="selectedPac(this)" class="btn btn-xs btn-outline-info"><i class="fas fa-plus"></i> Agregar</button>';
            $data[] = $array;
            $contador ++;
        }
        $response = array(
            "sEcho" => 1, //Información para el datatables
			"iTotalRecords" => count($data), //enviamos el total registros al datatable
			"iTotalDisplayRecords" => count($data), //enviamos el total registros a visualizar
			"aaData" => $data
        );
        return response()->json($response);
    }
    //Get paciente by id, para cargar en formulario de consulta
    public function getPacienteById(){
        $id_paciente = Crypt::decrypt(request()->input('id_paciente'));
        session(['id_paciente' => $id_paciente]);
        $consulta = DB::select('SELECT p.id,p.cod_paciente,p.fecha_reg,c.paciente,c.dui,c.motivo,c.fecha as fecha_cita,c.celular as telefono FROM `paciente` as p INNER JOIN citas as c on p.id_cita=c.id where p.id=?',[$id_paciente]);
        return response()->json($consulta[0]);
    }
    //Save consulta
    public function saveConsulta(Request $request){
        date_default_timezone_set('America/El_Salvador');
        $fecha = date('Y-m-d');
        $hora = date('H:m:s');
        $id_paciente = session('id_paciente');
        $usuario_id = Auth::user()->id;
        // Obtener la imagen cargada
        //$imagePath = $request->file('image')->store('public/images');
        $data = [
            'num_clinico' => $request->input('cod_clinico'),
            'fecha' => $fecha,
            'hora' => $hora,
            'motivo_consulta' => $request->input('consulta'),
            'genograma' => '-',
            'aprox_diagnostico' => $request->input('diagnostico'),
            'paciente_id' => $id_paciente,
            'usuario_id' => $usuario_id
        ];
        $consulta = Consultas::create($data);
        //Save sintomas
        $dataSintomas = [
            'fecha_regis' => $fecha,
            'hora_regis' => $hora,
            'sintoma' => $request->input('sintomas'),
            'conflicto' => $request->input('conflictos'),
            'situacion' => $request->input('situacion'),
            'id_consulta' => $consulta->id
        ];
        Sintomas::create($dataSintomas);
        return response()->json([
            'status' => 'inserted',
            'message' => 'Se ha registrado correctamente la consulta',
            'data' => []
        ]);
    }
}
