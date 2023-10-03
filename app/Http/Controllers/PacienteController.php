<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
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




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paciente $paciente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
        //
    }
}
