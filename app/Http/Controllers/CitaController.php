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
        'paciente' => request()->input('paciente'),
        'dui' => request()->input('dui'),
        'celular' => request()->input('celular'),
        'fecha' => request()->input('fecha'),
        'hora' => request()->input('hora'),
        'email' => request()->input('email'),
        'motivo' => request()->input('motivo'),
        'estado_cita' => 0
       ];
       Cita::create($data);
       return response()->json([
        'status' => 'inserted',
        'data' => ''
       ]);
       
    }
    
}


