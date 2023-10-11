<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fecha = Carbon::now()->toDateString(); // Formatea la fecha como 'YYYY-MM-DD'
        $hora = '8:00 AM';
        DB::table('citas')->insert([
            'paciente' => 'Paciente 1',
            'dui' => '1234567-1',
            'celular' => '7856-0001',
            'fecha' =>  $fecha,
            'hora' =>  $hora,
            'email' => 'paciente1@example.com',
            'motivo' => 'Motivo de la cita 1',
            'estado_cita' => 1,
            'terapeuta_id' => 1, // ID del terapeuta asignado
            'usuario_id' => 1, // ID del usuario asignado
        ]);




        $fecha = Carbon::now()->toDateString(); // Formatea la fecha como 'YYYY-MM-DD'
        $hora = '9:00 AM';
        DB::table('citas')->insert([
            'paciente' => 'Norma del carmen',
            'dui' => '1235667-1',
            'celular' => '7856-5601',
            'fecha' =>  $fecha,
            'hora' =>  $hora,
            'email' => 'normadelcarmen@example.com',
            'motivo' => 'problemas',
            'estado_cita' => 1,
            'terapeuta_id' => 2, // ID del terapeuta asignado
            'usuario_id' => 1, // ID del usuario asignado
        ]);
    }
}
