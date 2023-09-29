<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class TerapeutaController extends Controller
{
    public function saveTerapeuta(){
        $datos = [
            'nombre' => trim(request()->input('terapeuta')),
            'direccion' => trim(request()->input('direccion_t')),
            'dui' => request()->input('dui_t'),
            'telefono' => request()->input('telefono_t'),
            'email' => request()->input('email_t'),
            'usuario' => 'update2023',
            'password' => '-',
            'categoria' => 'Terapeuta',
            'estado' => 1
        ];
        //Validation terapeuta
        $vali = User::where('dui',request()->input('dui_t'))->exists();
        if($vali){
            return response()->json([
                'status' => 'exists',
                'msg' => 'El terapeuta ya existe!'
            ]);
        }
        $createdT = User::create($datos);
        return response()->json([
            'status' => 'inserted',
            'msg' => 'El terapeuta se ha registrado exitosamente!',
            'data' => $createdT
        ]);
    }
    //Get terapeutas
    public function getTerapeutas(){
        $terapeutas = User::where('categoria','Terapeuta')->orderBy('id','desc')->get();
        return response()->json($terapeutas);
    }
}
