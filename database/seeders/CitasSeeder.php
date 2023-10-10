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

        $date = Carbon::now(); 
        DB::table('citas')->insert([
            'paciente' => 'Paciente 1',
            'dui' => '1234567-1',
            'celular' => '7856-0001',
            'fecha' =>  $date->addDays(1),
            'hora' =>  $date->addDays(1)->format('d-m-Y'),
            'email' => 'paciente1@example.com',
            'motivo' => 'Motivo de la cita 1',
            'estado_cita' => 'confirmada',
            'terapeuta_id' => 1, // ID del terapeuta asignado
            'usuario_id' => 1, // ID del usuario asignado
        ]);

        DB::table('citas')->insert([
            'paciente' => 'Paciente 2',
            'dui' => '1234567-2',
            'celular' => '7856-0002',
            'fecha' =>  $date->addDays(2),
            'hora' =>  $date->addDays(2)->format('d-m-Y'),
            'email' => 'paciente2@example.com',
            'motivo' => 'Motivo de la cita 2',
            'estado_cita' => 'confirmada',
            'terapeuta_id' => 2, // ID del terapeuta asignado
            'usuario_id' => 2, // ID del usuario asignado
        ]);

        DB::table('citas')->insert([
            'paciente' => 'Paciente 3',
            'dui' => '1234567-3',
            'celular' => '7654-0003',
            'fecha' =>  $date->addDays(3),
            'hora' =>  $date->addDays(3)->format('d-m-Y'),
            'email' => 'paciente3@example.com',
            'motivo' => 'Motivo de la cita 3',
            'estado_cita' => 'confirmada',
            'terapeuta_id' => 3, // ID del terapeuta asignado
            'usuario_id' => 3, // ID del usuario asignado
        ]);

        DB::table('citas')->insert([
            'paciente' => 'Paciente 4',
            'dui' => '1234567-4',
            'celular' => '7654-0004',
            'fecha' =>  $date->addDays(4),
            'hora' =>  $date->addDays(4)->format('d-m-Y'),
            'email' => 'paciente4@example.com',
            'motivo' => 'Motivo de la cita 4',
            'estado_cita' => 'confirmada',
            'terapeuta_id' => 4, // ID del terapeuta asignado
            'usuario_id' => 4, // ID del usuario asignado
        ]);

        DB::table('citas')->insert([
            'paciente' => 'Paciente 5',
            'dui' => '1234567-5',
            'celular' => '7845-5678',
            'fecha' =>  $date->addDays(5),
            'hora' =>  $date->addDays(5)->format('d-m-Y'),
            'email' => 'paciente5@example.com',
            'motivo' => 'Motivo de la cita 5',
            'estado_cita' => 'confirmada',
            'terapeuta_id' => 5, // ID del terapeuta asignado
            'usuario_id' => 5, // ID del usuario asignado
        ]);
    }
}
