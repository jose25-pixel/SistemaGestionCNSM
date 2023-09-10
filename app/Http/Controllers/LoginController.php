<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function login()
    {

        $credentials = request()->validate([
            'user' => 'required',
            'password' => 'required'
        ]);
        $userBD = User::where('usuario', $credentials['user'])->first();
        //return response()->json(bcrypt($credentials['password']));
        if ($userBD && Hash::check($credentials['password'], $userBD['password'])) {
            if($userBD['estado'] == 1){
                // Credenciales válidas, redirigir al dashboard
                Auth::login($userBD);
                return redirect()->route('home');
            }else{
                return redirect()->back()->with('status', 'Usuario inhabilitado!');;    
            }
        }else{
            return redirect()->back()->with('status','Usuario o contraseña incorrectos');
        }
    }
}
