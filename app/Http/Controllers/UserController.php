<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        return view('usuarios.index');
    }

    public function dt_usuarios(){
        $users = DB::select('SELECT * FROM usuarios ORDER BY id DESC');
        $data = [];
        $contador = 1;
        foreach($users as $row){
            $array = [];
            $array[] = $contador;
            $array[] = $row->codigo; 
            $array[] = $row->nombre;
            $array[] = $row->dui;
            $array[] = $row->telefono;
            $array[] = $row->email;
            $array[] = $row->categoria;
            $button = $row->estado == 1 ? '<button title="Desactivar usuario" class="btn btn-xs btn-danger" onclick="disabledUser(this,0)" data-id="'.$row->id.'"><i class="fas fa-user-slash"></i></button>' : '<button title="Habilitar usuario" class="btn btn-xs btn-outline-success" onclick="disabledUser(this,1)" data-id="'.$row->id.'"><i class="fas fa-user-check"></i></button>';
            $array[] = '<button title="Editar información del usuario" data-id="'.$row->id.'" onclick="editUser(this)" class="btn btn-xs btn-outline-info mr-2"><i class="fas fa-user-edit"></i></button>'.$button;
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
    public function saveUser(){
        User::create([
            'codigo' => request()->input('cod'),
            'nombre' => trim(request()->input('nombre')),
            'direccion' => request()->input('direccion'),
            'dui' => request()->input('dui'),
            'telefono' => request()->input('telefono'),
            'email' => request()->input('email'),
            'usuario' => trim(request()->input('usuario')),
            'password' => bcrypt(request()->input('password')),
            'categoria' => request()->input('categoria'),
            'estado'=> 1
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Usuario registrado exitosamente!'
        ]);
    }
    public function editUser(){
        $id = request()->input('id');
        session(['id' => $id]);
        $user = User::find($id);
        return response()->json($user);
    }
    public function updateUser(){
        $id = session('id');
        $data = [
            'codigo' => request()->input('cod'),
            'nombre' => trim(request()->input('nombre')),
            'direccion' => request()->input('direccion'),
            'dui' => request()->input('dui'),
            'telefono' => request()->input('telefono'),
            'email' => request()->input('email'),
            'usuario' => trim(request()->input('usuario')),
            'categoria' => request()->input('categoria'),
            'estado'=> 1
        ];
        if(request()->input('password') != ""){
            $data['password'] = bcrypt(request()->input('password'));
        }
        User::where('id',$id)->update($data);
        return response()->json([
            'status' => 'updated',
            'message' => 'Usuario actualizado exitosamente!'
        ]);
    }
    public function disabledUser(){
        $id = session('id');
        $estado = request()->input('estado');
        User::where('id',$id)->update([
            'estado' => $estado,            
        ]);
        $strEstado = $estado == 1 ? "activado" : "desabilitado";
        return response()->json([
            'status' => 'disabled',
            'message' => 'Usuario '.$strEstado.' exitosamente!'
        ]);
    }
}
