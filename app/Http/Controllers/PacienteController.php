<?php

namespace App\Http\Controllers;


use App\Models\Paciente;
//use Barryvdh\DomPDF\Facade\pdf;
//use PDF;
use App\Models\Cita;
use App\Models\Adicciones;
use App\Models\Antecedente;
use App\Models\conyuge;
use App\Models\parentesco;
use App\Models\responsable;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
//use Barryvdh\DomPDF\PDF as DomPDFPDF;
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
        //Validacion para mostrar datos
        if (Auth()->user()->categoria == "Admin") {
            $pacientes = DB::select("SELECT p.id,p.cod_paciente, p.fecha_naci,p.fecha_reg,p.genero,p.ocupacion, 
            c.paciente,c.dui,c.celular,c.fecha,c.hora,c.motivo FROM `paciente` as p INNER join citas as c on p.id_cita=c.id order by p.id desc");
        } else if (Auth()->user()->categoria == "Recepcionista") {
            $pacientes = DB::select("SELECT p.id,p.cod_paciente, p.fecha_naci,p.fecha_reg,p.genero,p.ocupacion, 
            c.paciente,c.dui,c.celular,c.fecha,c.hora,c.motivo FROM `paciente` as p INNER join citas as c on p.id_cita=c.id order by p.id desc");
        } else {
            $pacientes = DB::select("SELECT p.id,p.cod_paciente, p.fecha_naci,p.fecha_reg,p.genero,p.ocupacion,c.paciente,c.dui,c.celular,c.fecha,c.hora,c.motivo FROM `paciente` as p INNER join citas as c on p.id_cita=c.id where c.terapeuta_id=? order by p.id desc", [Auth()->user()->id]);
        }
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
            $array[] = '<button data-id_cita="' . $row->id . '" onclick="ver(this)" class="btn btn-xs btn-outline-info"><i class="fas fa-eye"></i></button>
            <button data-id_paciente="' . $row->id . '" onclick="updatepaciente(' . $row->id . ')" class="btn btn-xs btn-outline-info"><i class="fas fa-user-edit"></i></button>
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




    //funcion para guardar primeramente los datos de paciente recordar que fecha de registro
    // la toma de la fecha actual ademas el codigo de paciente lo toma los datos del formulario de fecha nacimiento y valor aleatorio
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
        $paciente->nu_hermano = $request->input('nu_hermano');
        $paciente->lugar_ocupa = $request->input('lugar_ocupa');
        $paciente->nu_hijo = $request->input('nu_hijo');
        $paciente->edad_hijo = $request->input('edad_hijo');
        $paciente->ano_casado = $request->input('ano_casado');
        $paciente->id_cita = $request->input('cita_id');
        $paciente->usuario_id = $id_usuario;
        $paciente->save(); // Guardo los datos en paciente
        $this->saveconyuge($request, $paciente, $id_usuario); //se ejecuta la funion de guardar datos de conyuge
        $this->saveparentesco($request, $paciente, $id_usuario); // se ejecuta la funcion de guardar datos de parentesco (padre y madre) 
        $this->saveresponsable($request, $paciente, $id_usuario);
        $this->saveadiccion($request, $paciente, $id_usuario);
        $this->saveAntecedente($request, $paciente, $id_usuario);
        $citaId = $request->input('cita_id');
        // Actualiza el estado de la cita a 1 a cita atendida
        DB::table('citas')->where('id', $citaId)->update(['estado_cita' => 1]);
        return response()->json($paciente);
    }



    //funcion para guardar datos de la tabla conyuge
    public function saveconyuge($request, $paciente, $id_usuario)
    {
        $datos = [
            'nombre' => $request->input('nombrec'),
            'nivel_educativo' => $request->input('nivel_educativoc'),
            'ocupacion' => $request->input('ocupacionc'),
            'edad' => $request->input('edadc'),
            'notac' => $request->input('notac'),
            'id_paciente' => $paciente->id,
            'usuario_id' => $id_usuario
        ];
        conyuge::create($datos);
    }
    //Funcion guardar datos de la tabla parentesco
    public function saveparentesco($request, $paciente, $id_usuario)
    {
        $datos = [
            'nombre_madre' => $request->input('nombre_madre'),
            'edad_madre' => $request->input('edad_madre'),
            'estado_civilm' => $request->input('estado_civilm'),
            'nivel_educativom' => $request->input('nivel_educativom'),
            'ocupacionm' => $request->input('ocupacionm'),
            'vivem' => $request->input('vivem'),
            'duim' => $request->input('duim'),
            'notam' => $request->input('notam'),
            'viveaunm' => $request->input('viveaunm'),
            'duip' => $request->input('duip'),
            'notap' => $request->input('notap'),
            'viveaunp' => $request->input('viveaunp'),
            'nombrep' => $request->input('nombrep'),
            'edadp' => $request->input('edadp'),
            'estado_civilp' => $request->input('estado_civilp'),
            'ocupacionp' => $request->input('ocupacionp'),
            'nivel_educativop' => $request->input('nivel_educativop'),
            'vivep' => $request->input('vivep'),
            'id_paciente' => $paciente->id,
            'usuario_id' => $id_usuario
        ];
        parentesco::create($datos);
    }

    //Funcion guardar datos de la tabla responsable
    public function saveresponsable($request, $paciente, $id_usuario)
    {
        $datosr = [
            'nombrer' => $request->input('nombrer'),
            'estado_civilr' => $request->input('estado_civilr'),
            'nivel_educativor' => $request->input('nivel_educativor'),
            'edadr' => $request->input('edadr'),
            'ocupacionr' => $request->input('ocupacionr'),
            'duir' => $request->input('duir'),
            'id_paciente' => $paciente->id,
            'usuario_id' => $id_usuario
        ];
        responsable::create($datosr);
    }

    public function saveadiccion($request, $paciente, $id_usuario)
    {

        $datosa = [

            'fecha' => now(),
            'atencioncnsm' => $request->input('atencioncnsm'),
            //'tratamientos' => $request->input('tratamientorec'),
            'tipotratamiento' => $request->input('tipotratamiento'),
            'nombreatendio' => $request->input('nombreatendio'),
            'telefonoatendio' => $request->input('telefonoatendio'),
            'direcionatendio' => $request->input('direcionatendio'),
            'tratamientorec' => $request->input('tratamientorec'),
            'tipofarmaco' => $request->input('tipofarmaco'),
            'tipo_sustancia' => $request->input('tipo_sustancia'),
            'tiempo_consumo' => $request->input('tiempo_consumo'),
            'adiccion' => $request->input('adicion'),
            'id_paciente' => $paciente->id,
            'usuario_id' => $id_usuario
        ];
        Adicciones::create($datosa);
    }


    public function saveAntecedente($request, $paciente, $id_usuario)
    {

        $datosa = [

            'fecha' => now(),
            'patologias' => $request->input('patologias'),
            'enfergenetica' => $request->input('enfergenetica'),
            'otros' => $request->input('otros'),
            'iniciotrabajar' => $request->input('iniciotrabajar'),
            'trabaja' => $request->input('trabaja'),
            'trabaja_actualmente' => $request->input('trabaja_actualmente'),
            'duracion_empleo' => $request->input('duracion_empleo'),
            'despedido' => $request->input('despedido'),
            'causa' => $request->input('causa'),
            'satisfecho' => $request->input('satisfecho'),
            'id_paciente' => $paciente->id,
            'usuario_id' => $id_usuario
        ];
        Antecedente::create($datosa);
    }

    ///funcio para ver los datos de un solo paciente!!! y realizar reportes
    public function verDetallesPaciente(Request $request, $idCita)
    {
        try {


            //nueva_funcion
            //$pacienteDetalles=Paciente::find($idCita);
            //  dd( $pacienteDetalles->cita);
            $pacienteDetalles = Paciente::join('citas', 'paciente.id_cita', '=', 'citas.id')->select(
                'citas.paciente',
                'citas.dui',
                'citas.email',
                'citas.celular',
                'paciente.cod_paciente',
                'paciente.fecha_naci',
                'paciente.edad',
                'paciente.fecha_reg',
                'paciente.genero',
                'ocupacion',
                'lugar_estudio',
                'grado',
                'nivel_educativo',
                'direccion',
                'departamento',
                'municipio',
                'celular_dos',
                'celular_tres',
                'nu_hermano',
                'lugar_ocupa',
                'nu_hijo',
                'edad_hijo',
                'ano_casado'
            )->where('paciente.id', $idCita)->first();



            $pacienteparentesco = parentesco::join('paciente', 'parentesco.id_paciente', '=', 'paciente.id')->select(
                'paciente.id',
                'parentesco.nombre_madre',
                'parentesco.edad_madre',
                'parentesco.estado_civilm',
                'parentesco.nivel_educativom',
                'parentesco.ocupacionm',
                'parentesco.vivem',
                'parentesco.duim',
                'parentesco.notam',
                'parentesco.viveaunm',
                'parentesco.nombrep',
                'parentesco.edadp',
                'parentesco.estado_civilp',
                'parentesco.ocupacionp',
                'parentesco.nivel_educativop',
                'parentesco.vivep',
                'parentesco.duip',
                'parentesco.notap',
                'parentesco.viveaunp',

            )->where('paciente.id', $idCita)->first();


            $pacienteconyuge = conyuge::join('paciente', 'conyuge.id_paciente', '=', 'paciente.id')->select(
                'paciente.id',

                'nombre',
                'conyuge.nivel_educativo',
                'conyuge.ocupacion',
                'conyuge.edad',
                'conyuge.notac',

            )->where('paciente.id', $idCita)->first();

            $pacienteresponsable = responsable::join('paciente', 'responsable.id_paciente', '=', 'paciente.id')->select(
                'paciente.id',
                'nombrer',
                'responsable.estado_civilr',
                'responsable.nivel_educativor',
                'responsable.edadr',
                'responsable.ocupacionr',
                'responsable.duir',

            )->where('paciente.id', $idCita)->first();

            $pacienteantecedente = Antecedente::join('paciente', 'antecedentes_salud.id_paciente', '=', 'paciente.id')->select(
                'paciente.id',
                'antecedentes_salud.fecha',
                'antecedentes_salud.patologias',
                'antecedentes_salud.enfergenetica',
                'antecedentes_salud.otros',
                'antecedentes_salud.iniciotrabajar',
                'antecedentes_salud.trabaja',
                'antecedentes_salud.trabaja_actualmente',
                'antecedentes_salud.duracion_empleo',
                'antecedentes_salud.despedido',
                'antecedentes_salud.causa',
                'antecedentes_salud.satisfecho',

            )->where('paciente.id', $idCita)->first();


            $pacienteadicciones = Adicciones::join('paciente', 'adicciones.id_paciente', '=', 'paciente.id')->select(
                'paciente.id',
                'adicciones.fecha',
                'adicciones.atencioncnsm',
                'adicciones.tratamientos',
                'adicciones.tipotratamiento',
                'adicciones.nombreatendio',
                'adicciones.direcionatendio',
                'adicciones.telefonoatendio',
                'adicciones.tratamientorec',
                'adicciones.tipofarmaco',
                'adicciones.tipo_sustancia',
                'adicciones.tiempo_consumo',
                'adicciones.adiccion',

            )->where('paciente.id', $idCita)->first();

            $numarticulo = Paciente::select('cod_paciente')->where('id', $idCita)->get();

            //return $pdf->download('cod_paciente.pdf');

            $pdf = PDF::loadView('pacientes.detalles_paciente', [
                'paciente' => $pacienteDetalles,
                'parentesco' => $pacienteparentesco, 'conyuge' => $pacienteconyuge, 'responsable' => $pacienteresponsable, 'antecedente' => $pacienteantecedente, 'adicciones' => $pacienteadicciones
            ]);
            return $pdf
                ->stream('reporte-' . $numarticulo[0]->cod_paciente . '.pdf');

            // return response()->json(['paciente' => $pacienteDetalles]);

        } catch (\Exception $e) {
            // Manejar el error, por ejemplo, registrar el mensaje de error o devolver una respuesta de error al cliente
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }



    /// Fucion para verificar si los datso de la cita ya se encuantra en tabla paciente

    public function verificarPaciente()
    {
        $citaId = request()->input('id');
        $dui = request()->input('dui');
        $paciente = request()->input('paciente');

        $sql = "SELECT c.id  as id_paciente, p.id, p.direccion  FROM citas as c INNER JOIN paciente as
         p on c.id=p.id_cita WHERE c.dui=? and c.paciente LIKE ? ";

        //$sql="SELECT c.id, p.id as id_paciente FROM citas as c INNER JOIN paciente as 
        //p on c.id=p.id_cita WHERE c.dui='82402498-9' and c.paciente LIKE '%JUANA GUADALUPE CAMPOS ORELLANA%'";

        $verificar = DB::select($sql, [$dui, '%' . $paciente . '%']);

        if ($verificar) {
            // dd($verificar);

            //Obtiene el ID del paciente
            $idPaciente = $verificar[0]->id;

            // Obtiene el ID de la cita verificada
            // $idCitaVerificada = $verificar[0]->id;



            // Actualiza el campo id_cita en la tabla paciente con el ID de la cita verificada
            Paciente::where('id', $idPaciente)->update(['id_cita' => $citaId]);
            Cita::where('id', $citaId)->update(['estado_cita' => 1]);
            // DB::table('citas')->where('id', $citaId)->update(['estado_cita' => 1]);

            return response()->json(
                [
                    'status' => 'exists',
                    'message' => 'la Informacion del cosultante ya estan registrados, la cita ha sido atendida!!',
                    'data' => $verificar[0]
                ]

            );
        }
        return response()->json([
            'status' => 'not-found',
            'message' => 'No existe  información del  cosultante anteriormente en el sistema, ¡porfavor ingrese los demas datos!!!',
            'data' => []
        ]);
    }






    //Obtener datos de un solo paciente mediante su id para poder editar

    public function getidPaciente($dPaciente)
    {
        //con esta linea de codigo estoy trayendo os datos segun id del paciente u la relación con sus diferentes tablas usando los modelos de laravel, configurar las relaciones en el modelo de uno auno o uno a muchos!!!
        $data = Paciente::with('Cita', 'parentesco', 'conyuge', 'Atecedente', 'responsable', 'Adiccione')->find($dPaciente);
        if ($data) {
            session(['paciente_id' => $dPaciente]);
            // Si se encontraron datos, devolver una respuesta JSON con el estado 'exists' y los datos del paciente
            return response()->json([
                'status' => 'exists',
                'message' => '',
                'data' => $data
            ]);
        } else {
            // Si no se encontraron datos, devolver una respuesta JSON con el estado 'not_found'
            return response()->json([
                'status' => 'not_found',
                'message' => 'No se encontraron datos para la cita especificada.'
            ]);
        }
    }

    public function  updatePaciente(Request $request)
    {
        $paciente_id = session('paciente_id');

        $fechaNacimiento = $request->input('fecha_naci');
        $fechaNacimientoFormat = date("Ymd", strtotime($fechaNacimiento));
        $codPaciente = $fechaNacimientoFormat . rand(100, 999);
        $datosPaciente = [
            "fecha_naci" => $request->input('fecha_naci'),
            "edad" => $request->input('edad'),
            "genero" => $request->input('genero'),
            "ocupacion" => $request->input('ocupacion'),
            "lugar_estudio" => $request->input('lugar_estudio'),
            "grado" => $request->input('grado'),
            "nivel_educativo" => $request->input('nivel_educativo'),
            "direccion" => $request->input('direccion'),
            "departamento" => $request->input('departamento'),
            "municipio" => $request->input('municipio'),
            "celular_dos" => $request->input('celular_dos'),
            "celular_tres" => $request->input('celular_tres'),
            "nu_hermano" => $request->input('nu_hermano'),
            "lugar_ocupa" => $request->input('lugar_ocupa'),
            "nu_hijo" => $request->input('nu_hijo'),
            "edad_hijo" => $request->input('edad_hijo'),
            "ano_casado" => $request->input('ano_casado')
        ];
        Paciente::where('id',$paciente_id)->update($datosPaciente);
        //Actualizar conyuge
        $datos = [
            'nombre' => $request->input('nombrec'),
            'nivel_educativo' => $request->input('nivel_educativoc'),
            'ocupacion' => $request->input('ocupacionc'),
            'edad' => $request->input('edadc'),
            'notac' => $request->input('notac')
        ];
        conyuge::where('id_paciente',$paciente_id)->update($datos);
        //Actualizar parentesco
        $datoParentesco = [
            'nombre_madre' => $request->input('nombre_madre'),
            'edad_madre' => $request->input('edad_madre'),
            'estado_civilm' => $request->input('estado_civilm'),
            'nivel_educativom' => $request->input('nivel_educativom'),
            'ocupacionm' => $request->input('ocupacionm'),
            'vivem' => $request->input('vivem'),
            'duim' => $request->input('duim'),
            'notam' => $request->input('notam'),
            'viveaunm' => $request->input('viveaunm'),
            'duip' => $request->input('duip'),
            'notap' => $request->input('notap'),
            'viveaunp' => $request->input('viveaunp'),
            'nombrep' => $request->input('nombrep'),
            'edadp' => $request->input('edadp'),
            'estado_civilp' => $request->input('estado_civilp'),
            'ocupacionp' => $request->input('ocupacionp'),
            'nivel_educativop' => $request->input('nivel_educativop'),
            'vivep' => $request->input('vivep')
        ];
        parentesco::where('id_paciente',$paciente_id)->update($datoParentesco);
        //Actualizar responsable
        $datosr = [
            'nombrer' => $request->input('nombrer'),
            'estado_civilr' => $request->input('estado_civilr'),
            'nivel_educativor' => $request->input('nivel_educativor'),
            'edadr' => $request->input('edadr'),
            'ocupacionr' => $request->input('ocupacionr'),
            'duir' => $request->input('duir')
        ];
        responsable::where('id_paciente',$paciente_id)->update($datosr);
        //Actualizar adicciones
        $datosa = [
            'atencioncnsm' => $request->input('atencioncnsm'),
            'tratamientos' => $request->input('tratamientos'),
            'tipotratamiento' => $request->input('tipotratamiento'),
            'nombreatendio' => $request->input('nombreatendio'),
            'telefonoatendio' => $request->input('telefonoatendio'),
            'direcionatendio' => $request->input('direcionatendio'),
            'tratamientorec' => $request->input('tratamientorec'),
            'tipofarmaco' => $request->input('tipofarmaco'),
            'tipo_sustancia' => $request->input('tipo_sustancia'),
            'tiempo_consumo' => $request->input('tiempo_consumo'),
            'adiccion' => $request->input('adicion')
        ];
        Adicciones::where('id_paciente',$paciente_id)->update($datosa);
        //Actualizar antecedentes
        $datosa = [
            'patologias' => $request->input('patologias'),
            'enfergenetica' => $request->input('enfergenetica'),
            'otros' => $request->input('otros'),
            'iniciotrabajar' => $request->input('iniciotrabajar'),
            'trabaja' => $request->input('trabaja'),
            'trabaja_actualmente' => $request->input('trabaja_actualmente'),
            'duracion_empleo' => $request->input('duracion_empleo'),
            'despedido' => $request->input('despedido'),
            'causa' => $request->input('causa'),
            'satisfecho' => $request->input('satisfecho')
        ];
        Antecedente::where('id_paciente',$paciente_id)->update($datosa);
        return response()->json([
            'status' => 'update',
            'data' => ''
        ]);
    }
}
