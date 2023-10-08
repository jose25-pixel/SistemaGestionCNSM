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
use PhpParser\Node\Expr\FuncCall;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pacientes.index');
    }

    public function getpacientes()
    {
        $pacientes = DB::select("SELECT p.id,p.cod_paciente, p.fecha_naci,
        p.fecha_reg,p.genero,p.ocupacion, 
        c.paciente,c.dui,c.celular,c.fecha,
        c.hora,c.motivo FROM `paciente` as p INNER join citas as c on p.id_cita=c.id order by p.id desc");
        $data = [];
        $contador = count($pacientes);
        foreach ($pacientes as $row) {
            $array = [];
            $array[] = $contador;
            $array[] = $row->cod_paciente;
            $array[] = $row->dui;
            $array[] = $row->paciente;
            $array[] = $row->fecha_naci;
            $array[] = $row->celular;
            $array[] = $row->genero;
            $array[] = $row->ocupacion;
            $array[] = date('d-m-Y', strtotime($row->fecha_reg));
            $array[] = '<button data-id_cita="' . $row->id . '" onclick="Ingresar(this)" class="btn btn-xs btn-outline-info"><i class="fas user-edit"></i>Editar</button>
            <button data-id_cita="' . $row->id . '" onclick="updateCita(this)" class="btn btn-xs btn-outline-info"><i class="fas user-edit"></i>Ver</button>
            ';
            $data[] = $array;
            $contador--;
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




    //fucnio para guardar primeramente los datos de paciente recordar que fecha de registro
    // la toma de la fecha actual ademas l codigo de paciente es deinsertar tomando los datos del formulario
    public function guardarp(Request $request)
    {
        $id_usuario = Auth::user()->id;
        // Crear un nuevo paciente
        $paciente = new Paciente;
        // Generar el código del paciente a partir de la fecha de nacimiento y un número aleatorio
        $fechaNacimiento = $request->input('fecha_naci');
        $fechaNacimientoFormat = date("Ymd", strtotime($fechaNacimiento));
        $codPaciente = $fechaNacimientoFormat . rand(100, 999);
        $paciente->cod_paciente = $codPaciente;
        $paciente->fecha_naci = $request->input('fecha_naci');
        $paciente->edad = $request->input('edad');
        $paciente->fecha_reg = now();
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
        $paciente->id_cita = $request->input('cita_id');
        $paciente->usuario_id = $id_usuario;        
        $paciente->save();
        $this->saveconyuge($request, $paciente, $id_usuario);
        return response()->json($paciente);
    }

    public Function saveconyuge($request,$paciente,$id_usuario)
    {
        $datos = [
            'nombre' => $request->input('nombrec'),
            'nivel_educativo'=> $request->input('nivel_educativoc'),
            'ocupacion'=> $request->input('ocupacionc'),
            'edad'=> $request->input('edadc'),  
            'numero_hijo'=> $request->input('numero_hijo'),
            'edades'=> $request->input('edades'),
            'id_paciente'=>$paciente->id,
            'usuario_id'=>$id_usuario
           ];
           conyuge::create($datos);
    }



}
