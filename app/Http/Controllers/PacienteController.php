<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\conyuge;  
use App\Models\parentesco;
use App\Models\responsable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;


class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('pacientes.index');
    }


    public function getpacientes(){
        $pacientes = DB::select("SELECT p.id,p.cod_paciente, p.fecha_naci,
        p.fecha_reg,p.genero,p.ocupacion, 
        c.paciente,c.dui,c.celular,c.fecha,
        c.hora,c.motivo FROM `paciente` as p INNER join citas as c on p.id_cita=c.id order by p.id desc");
 
        $data = [];
        $contador = count($pacientes);
        foreach($pacientes as $row){
            $array = [];
            $array[] = $contador;
            $array[] = $row->cod_paciente; 
            $array[] = $row->dui;
            $array[] = $row->paciente;
            $array[] = $row->fecha_naci;
            $array[] = $row->celular;
            $array[] = $row->genero;
            $array[] = $row->ocupacion;
            $array[] = date('d-m-Y',strtotime($row->fecha_reg));
            $array[] = '<button data-id_cita="'.$row->id.'" onclick="Ingresar(this)" class="btn btn-xs btn-outline-info"><i class="fas user-edit"></i>Editar</button>
            <button data-id_cita="'.$row->id.'" onclick="updateCita(this)" class="btn btn-xs btn-outline-info"><i class="fas user-edit"></i>agregar</button>
            <button class="btn btn-xs btn-danger" onclick="cancelCita(this)" data-id_cita="'.$row->id.'"><i class="fas user-slash"></i> Cancelar</button>';
            $data[] = $array;
            $contador --;
        }
        $authUserId = Auth::user()->id;
        $codigoPaciente = date('dmY') . rand();
        $response = array(
            "sEcho" => 1, //Información para el datatables
            "iTotalRecords" => count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords" => count($data), //enviamos el total registros a visualizar
            "aaData" => $data
        );
        return response()->json($response);
  } 

   
  //public function pacientegetid(){
    //$id_cita = request()->input('id_cita');
    //session(['id_cita' => $id_cita]);
    //$data = Paciente::find($id_cita);
    //return response()->json($data);
//}

 //fucnio para guardar primeramente los datos de paciente recordar que fecha de registro
 // la toma de la fecha actual ademas l codigo de paciente es deinsertar tomando los datos del formulario
public function guardarpaciente(Request $request)
{

 // Crear un nuevo paciente
 $paciente = new Paciente;
 $paciente->cita_id = $request->input('cita_id');
 $paciente->fecha_naci = $request->input('fecha_naci');
 
 $paciente->edad = $request->input('edad');
 $paciente->genero = $request->input('genero');
 
 $paciente->ocupacion = $request->input('ocupacion');
 $paciente->lugar_estudio = $request->input('lugar_estudio');
 $paciente->grado = $request->input('grado');
 $paciente->nivel_educativo = $request->input('nivel_educativo');
 $paciente->direccion = $request->input('direccion');
 $paciente->departamento = $request->input('departamento');
 $paciente->municipio = $request->input('municipio');
 $paciente->celular_dos = $request->input('celular_dos');
 $paciente->celular_tres = $request->input('celular_tres');
 $paciente->save();

 // Devolver una respuesta, por ejemplo, el ID del paciente creado

 return response()->json([
    'status' => 'inserted',
    'data' =>   ''
   ]);
}
}

