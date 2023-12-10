<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Consultas;
use App\Models\Sintomas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class ConsultasController extends Controller
{
    //Vista principal
    public function index(){
        return view('consulta.index');
    }
    public function datatable_consulta(){
        if(Auth()->user()->categoria == "Admin"){
            $consulta = DB::select('SELECT c.id,c.num_clinico,c.fecha,c.hora,c.motivo_consulta,c.genograma,ct.paciente,ct.dui,ct.celular,ct.email,ct.motivo,p.fecha_naci,p.genero,p.direccion FROM `consultas` as c inner join paciente as p on c.paciente_id=p.id inner join citas as ct on p.id_cita=ct.id order by c.id desc');
        }else{
            $consulta = DB::select('SELECT c.id,c.num_clinico,c.fecha,c.hora,c.motivo_consulta,c.genograma,ct.paciente,ct.dui,ct.celular,ct.email,ct.motivo,p.fecha_naci,p.genero,p.direccion FROM `consultas` as c inner join paciente as p on c.paciente_id=p.id inner join citas as ct on p.id_cita=ct.id where c.usuario_id=? order by c.id desc',[Auth()->user()->id]);
        }
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
            $array[] = $row->motivo_consulta;
            $array[] = '<button title="Editar información de la consulta" data-id_consulta="'.$row->id.'" onclick="editConsult(this)" class="btn btn-xs btn-outline-info"><i class="fas fa-user-edit"></i></button>
            <button title="Eliminar o remover esta consulta" class="btn btn-xs btn-danger" onclick="delConsulta(this)" data-id_consulta="'.$row->id.'"><i class="fas fa-trash"></i></button>
            <button title="Generar PDF de la consulta" class="btn btn-xs btn-outline-info" onclick="genrarPDF(this)" data-id_consulta="'.$row->id.'"><i class="far fa-file-pdf" style="color: #e85e5e;"></i></button>';
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
        //Validacion para mostrar datos
        if (Auth()->user()->categoria == "Admin") {
            $consulta = DB::select('SELECT p.id,p.cod_paciente,p.fecha_reg,c.paciente,c.dui,c.motivo,c.fecha as fecha_cita,c.celular as telefono FROM `paciente` as p INNER JOIN citas as c on p.id_cita=c.id GROUP by p.id,p.cod_paciente,p.fecha_reg,c.paciente,c.dui,c.motivo,fecha_cita,telefono ORDER by p.id desc');
        } else {
            $consulta = DB::select('SELECT p.id, p.cod_paciente, p.fecha_reg, c.paciente, c.dui, c.motivo, c.fecha as fecha_cita, c.celular as telefono FROM paciente as p INNER JOIN citas as c on p.id_cita = c.id WHERE c.terapeuta_id=? GROUP BY p.id, p.cod_paciente, p.fecha_reg, c.paciente, c.dui, c.motivo, fecha_cita, telefono ORDER BY p.id DESC;',[Auth()->user()->id]);
        }
        $data = [];
        $contador = 1;
        foreach($consulta as $row){
            $array = [];
            $array[] = $row->cod_paciente; 
            $array[] = $row->paciente;
            $array[] = $row->dui;
            $array[] = $row->telefono;
            $array[] = date('d-m-Y',strtotime($row->fecha_cita));
            $array[] = '<button data-id_paciente="'.$row->id.'" onclick="selectedPac(this)" class="btn btn-xs btn-outline-info"><i class="fas fa-plus"></i> Agregar</button>';
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
        $id_paciente = request()->input('id_paciente');
        session(['id_paciente' => $id_paciente]);
        $consulta = DB::select('SELECT p.id,p.cod_paciente,p.fecha_reg,c.paciente,c.dui,c.motivo,c.fecha as fecha_cita,c.celular as telefono FROM `paciente` as p INNER JOIN citas as c on p.id_cita=c.id where p.id=?',[$id_paciente]);
        return response()->json($consulta[0]);
    }
    //Save consulta
    public function saveConsulta(Request $request){
        date_default_timezone_set('America/El_Salvador');
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $id_paciente = session('id_paciente');
        $usuario_id = Auth::user()->id;
        $sintomas = json_decode(request()->input('sintomas'),true);
        // Obtener la imagen cargada
        if($request->hasFile('genograma')){
            $imagePath = $request->file('genograma')->store('consultas/genogramas','public');
        }else{
            $imagePath = '-';
        }
        $data = [
            'num_clinico' => $request->input('cod_clinico'),
            'fecha' => $fecha,
            'hora' => $hora,
            'motivo_consulta' => $request->input('consulta'),
            'genograma' => $imagePath,
            'aprox_diagnostico' => $request->input('diagnostico'),
            'situacion_actual' => $request->input('situacion_actual'),
            'paciente_id' => $id_paciente,
            'usuario_id' => $usuario_id
        ];
        $consulta = Consultas::create($data);
        //Save sintomas
        foreach($sintomas as $row){
            $dataSintomas = [
                'fecha_regis' => $fecha,
                'hora_regis' => $hora,
                'sintoma' => $row['sintoma'],
                'conflicto' => $row['conflicto'],
                'id_consulta' => $consulta->id
            ];
            Sintomas::create($dataSintomas);
        }
        return response()->json([
            'status' => 'inserted',
            'message' => 'Se ha registrado correctamente la consulta',
            'data' => []
        ]);
    }
    /**
     * Editar consulta
     */
    public function editConsult(){
        $id_consulta = request()->input('id_consulta');
        session(['consulta_id'=> $id_consulta]);
        $consulta = Consultas::find($id_consulta);
        $sintomas = Sintomas::where('id_consulta',$id_consulta)->get();
        $response = [
            'consulta' => $consulta,
            'sintomas' => $sintomas
        ];
        return response()->json($response);
    }
    //Update consulta
    public function updateConsult(Request $request){
        date_default_timezone_set('America/El_Salvador');
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $consulta_id = session('consulta_id');
        $usuario_id = Auth::user()->id;
        $sintomas = json_decode(request()->input('sintomas'),true);
        // Obtener la imagen cargada
        
        $consulta = Consultas::find($consulta_id);
        if($request->hasFile('genograma')){
            $pathImage = "public/".$consulta['genograma'];
            if(Storage::exists($pathImage)){
                Storage::delete($pathImage); //Delete imagen antigua
            }
            $imagePath = $request->file('genograma')->store('consultas/genogramas','public');
        }else{
            $imagePath = $consulta['genograma']; //Imagen permanece
        }
        $data = [
            'motivo_consulta' => $request->input('consulta'),
            'genograma' => $imagePath,
            'aprox_diagnostico' => $request->input('diagnostico'),
            'situacion_actual' => $request->input('situacion_actual')
        ];
        $consulta = Consultas::where('id',$consulta_id)->update($data);
        //Delete sintomas
        Sintomas::where('id_consulta',$consulta_id)->delete();
        //Save nuevos sintomas o actuales
        foreach($sintomas as $row){
            $dataSintomas = [
                'fecha_regis' => $fecha,
                'hora_regis' => $hora,
                'sintoma' => $row['sintoma'],
                'conflicto' => $row['conflicto'],
                'id_consulta' => $consulta_id
            ];
            Sintomas::create($dataSintomas);
        }
        return response()->json([
            'status' => 'updated',
            'message' => 'Se ha actualizado correctamente la consulta',
            'data' => []
        ]);
    }
    /**
     * Remover consulta
     */
    function destroyConsult(){
        $id = request()->input('id');
        //Validar si existe en paciente
        $valid = Consultas::where('id',$id)->exists();
        $validSintomas = Sintomas::where('id_consulta',$id)->exists();
        if($valid && $validSintomas){
            //Delete
            Consultas::where('id',$id)->delete();
            Sintomas::where('id_consulta',$id)->delete();
            return response()->json([
                'status' => 'delete'
            ]); 
        }
        return response()->json([
            'status' => 'error-500'
        ]);
    }
    /**
     * Reporte en PDF
     */
    public function generarPDFConsult(){
        $consulta_id = request()->input('consulta_id');
        $consultas = DB::select('SELECT c.id,c.num_clinico,c.fecha,c.hora,c.motivo_consulta,c.genograma,ct.paciente,ct.dui,ct.celular,ct.email,ct.motivo,p.cod_paciente,p.fecha_naci,p.genero,p.direccion FROM `consultas` as c inner join paciente as p on c.paciente_id=p.id inner join citas as ct on p.id_cita=ct.id where c.id=? order by c.id desc',[$consulta_id]);
        //Data de los sintomas
        $sintomas = Sintomas::where('id_consulta',$consulta_id)->get();
        $pdf = PDF::loadView('consulta.pdf.consulta',compact('consultas','sintomas'));
        return $pdf->stream('reporte-' . $consultas[0]->num_clinico . '.pdf');
    }
}
