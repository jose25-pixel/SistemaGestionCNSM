<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\TerapeutaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class,'home'])->name('home')->middleware('auth');
//Rutas para citas y control citas
Route::get('/citas/diarias',[CitaController::class,'index'])->name('cita.index')->middleware('auth');
Route::get('/paciente',[PacienteController::class,'index'])->name('paciente.index')->middleware('auth');

Route::post('/citas/guardar', [CitaController::class, 'guardarCita'])->name('citas.guardar');
Route::post('cita/verificar/disponibilidad',[CitaController::class,'disponibilidaHora']);
Route::get('citas/cantidades',[CitaController::class,'getCountDateCita']);
Route::get('cita/pacientes/datatable/{fecha}',[CitaController::class,'getCitasPaciDT']);
Route::post('cita/validation/dui',[CitaController::class,'validationDUICita']);
Route::get('citas/all',[CitaController::class,'getListadoGenCita']);
Route::post('citas/cancelar',[CitaController::class,'cancelarCita']);
Route::post('citas/edit',[CitaController::class,'getCitaById']); 
Route::put('citas/update',[CitaController::class,'updateCita']); 
//Routas para terapeuta
Route::post('terapeuta/save',[TerapeutaController::class,'saveTerapeuta']);
Route::get('terapeuta/all',[TerapeutaController::class,'getTerapeutas']);

//Routas para login y register
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'login'])->name('login.auth');
Route::get('/logout',[LogoutController::class,'logout'])->name('logout');