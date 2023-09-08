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
       //instanciar el modelo
       $cita= new Cita();
       //tomar los datos de request
       $cita->paciente = $request->paciente;
       $cita->dui = $request->dui;
       $cita->celular= $request->celular;
       $cita->fecha = $request->fecha;
       $cita->hora = $request->hora;
       $cita->email = $request->email;
       $cita->motivo = $request->motivo;
           //guardar el objeto en la tabla
        $cita->save();
    
        
        
    }
    
}


