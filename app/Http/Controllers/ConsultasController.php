<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultasController extends Controller
{
    //Vista principal
    public function index(){
        return view('consulta.index');
    }
    public function datatable_consulta(){
        $consulta = DB::select('SELECT c.id,c.num_clinico,c.fecha,c.hora,c.motivo_consulta,c.Genograma,ct.paciente,ct.dui,ct.celular,ct.email,ct.motivo,p.fecha_naci,p.genero,p.direccion FROM `consultas` as c inner join paciente as p on c.id_paciente=p.id inner join citas as ct on p.id_cita=ct.id');
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
        $consulta = DB::select('SELECT p.id,c.num_clinico,p.fecha_reg,ct.paciente,ct.dui,ct.celular,ct.email,ct.motivo,p.fecha_naci,p.genero,p.direccion FROM `consultas` as c inner join paciente as p on c.id_paciente=p.id inner join citas as ct on p.id_cita=ct.id');
        $data = [];
        $contador = 1;
        foreach($consulta as $row){
            $array = [];
            $array[] = $row->num_clinico; 
            $array[] = $row->paciente;
            $array[] = $row->dui;
            $array[] = $row->celular;
            $array[] = date('d-m-Y',strtotime($row->fecha_reg));
            $array[] = '<button data-id_cita="'.$row->id.'" onclick="selectedPac(this)" class="btn btn-xs btn-outline-info"><i class="fas fa-plus"></i>Agregar</button>';
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
}
