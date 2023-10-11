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
        $fecha = Carbon::parse('12-10-2023')->toDateString(); // Formatea la fecha como 'YYYY-MM-DD'
        $hora = '8:00 AM';
            DB::table('citas')->insert([
            'paciente' => 'Paciente 1',
            'dui' => '1234567-1',
            'celular' => '7856-0001',
            'fecha' =>  $fecha,
            'hora' =>  $hora,
            'email' => 'paciente1@example.com',
            'motivo' => 'Motivo de la cita 1',
            'estado_cita' => '0',
            'terapeuta_id' => 1, // ID del terapeuta asignado
            'usuario_id' => 1, // ID del usuario asignado
        ]);

     

      

       
    }
}
