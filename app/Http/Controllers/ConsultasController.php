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
        $consultas = DB::table("SELECT c.id,c.num_clinico,c.fecha,c.hora,c.motivo_consulta,c.Genograma,ct.paciente,ct.dui,ct.celular,ct.email,ct.motivo,p.fecha_naci,p.genero,p.direccion FROM `consulta` as c inner join paciente as p on c.id_paciente=p.id inner join citas as ct on p.id_cita=ct.id");
        $data = [];
        $contador = 1;
        echo json_encode($consultas);
        foreach($consultas as $row){
            $array = [];
            $array[] = $contador;
            $array[] = $row->num_clinico; 
            $array[] = $row->dui;
            $array[] = $row->paciente;
            $array[] = date('d-m-Y',strtotime($row->fecha));
            $array[] = $row->hora;
            $array[] = '-sssdssss';//$row->motivo;
            $array[] = '<button data-id_cita="'.$row->id.'" onclick="updateCita(this)" class="btn btn-xs btn-outline-info"><i class="fas user-edit"></i>Editar</button>
            <button class="btn btn-xs btn-danger" onclick="cancelCita(this)" data-id_cita="'.$row->id.'"><i class="fas user-slash"></i> Cancelar</button>';
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
}