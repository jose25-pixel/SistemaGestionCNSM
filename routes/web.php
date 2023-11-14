<?php

use App\Http\Controllers\ChartController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\ConsultasController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\TerapeutaController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'home'])
    ->name('home')
    ->middleware('auth')
    ->uses([ChartController::class, 'index']);

//Rutas para citas y control citas
Route::get('/citas/diarias', [CitaController::class, 'index'])->name('cita.index')->middleware('auth');
Route::get('/paciente', [PacienteController::class, 'index'])->name('paciente.index')->middleware('auth');

Route::post('/citas/guardar', [CitaController::class, 'guardarCita'])->name('citas.guardar')->middleware('auth');
Route::post('cita/verificar/disponibilidad', [CitaController::class, 'disponibilidaHora'])->middleware('auth');
Route::get('citas/cantidades', [CitaController::class, 'getCountDateCita'])->middleware('auth');
Route::get('cita/pacientes/datatable/{fecha}', [CitaController::class, 'getCitasPaciDT'])->middleware('auth');
Route::post('cita/validation/dui', [CitaController::class, 'validationDUICita'])->middleware('auth');
Route::get('citas/all', [CitaController::class, 'getListadoGenCita'])->middleware('auth');
//Se añadio ruta para mostrar las citas por dia actual
Route::get('citas/alert-hoy', [CitaController::class, 'alertCitasHoy'])->middleware('auth');
Route::post('citas/cancelar', [CitaController::class, 'cancelarCita'])->middleware('auth');
Route::post('citas/edit', [CitaController::class, 'getCitaById'])->middleware('auth');
Route::put('citas/update', [CitaController::class, 'updateCita'])->middleware('auth');
Route::get('citas/contador/dia', [CitaController::class, 'getCantidadCitaDay'])->middleware('auth');
Route::post('citas/verifyExists/dui', [CitaController::class, 'verifyExistsCita'])->middleware('auth');
Route::delete('citas/destroy', [CitaController::class, 'destroyCita'])->middleware('auth');

//Routas para terapeuta
Route::post('terapeuta/save', [TerapeutaController::class, 'saveTerapeuta'])->middleware('auth');
Route::get('terapeuta/all', [TerapeutaController::class, 'getTerapeutas'])->middleware('auth');

Route::get('consultas', [ConsultasController::class, 'index'])->name('consulta.index')->middleware('auth');
Route::get('consultas/pacientes/datatable', [ConsultasController::class, 'datatable_consulta'])->middleware('auth');
Route::get('consultas/seleccionar/pacientes', [ConsultasController::class, 'dt_pacientes'])->middleware('auth');
Route::post('consulta/getPaciente/selected', [ConsultasController::class, 'getPacienteById'])->middleware('auth');
Route::post('consulta/save', [ConsultasController::class, 'saveConsulta'])->middleware('auth');
Route::post('consulta/edit', [ConsultasController::class, 'editConsult'])->middleware('auth');
Route::put('consulta/update', [ConsultasController::class, 'updateConsult'])->middleware('auth');
Route::delete('consulta/destroy',[ConsultasController::class,'destroyConsult'])->name('consulta.destroy')->middleware('auth');
Route::post('consulta/reporte',[ConsultasController::class,'generarPDFConsult'])->name('consulta.pdf')->middleware('auth');

Route::get('pacientes/datatable', [PacienteController::class, 'getpacientes'])->middleware('auth');
Route::get('pacientes/id', [PacienteController::class, 'pacientegetid'])->middleware('auth');
Route::get('citas/select', [CitaController::class, 'getCitas'])->middleware('auth');
Route::post('pacientes/save', [PacienteController::class, 'guardarp'])->middleware('auth');

Route::get('pacientes/ver/{idCita}', [PacienteController::class, 'verDetallesPaciente'])->middleware('auth'); 
  
Route::post('verificar/paciente', [PacienteController::class, 'verificarPaciente'])->middleware('auth'); 
Route::post('paciente/edit/{idPaciente}', [PacienteController::class, 'getidPaciente'])->middleware('auth'); 
Route::put('paciente/update/{idPaciente}', [PacienteController::class, 'updatepacienteid'])->middleware('auth');

/**
 * RUTAS DE USUARIOS
 */
Route::get('usuarios', [UserController::class, 'index'])->name('user.index')->middleware('auth');
Route::get('usuarios/datatable', [UserController::class, 'dt_usuarios'])->middleware('auth');
Route::post('usuarios/save', [UserController::class, 'saveUser'])->middleware('auth');
Route::post('usuarios/edit', [UserController::class, 'editUser'])->middleware('auth');
Route::put('usuarios/update', [UserController::class, 'updateUser'])->middleware('auth');
Route::post('usuarios/disabled',[UserController::class,'disabledUser'])->name('user.disabled')->middleware('auth');

//Routas para login y register
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.auth');
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout')->middleware('auth');

