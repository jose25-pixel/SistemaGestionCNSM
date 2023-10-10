<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'codigo' => 'codigo1',
            'nombre' => 'Usuario Uno',
            'direccion' => 'Calle Uno 123',
            'dui' => '12345678-1',
            'telefono' => '6724-4567',
            'email' => 'usuario1@example.com',
            'usuario' => 'cruz',
            'password' => bcrypt('jose002'),
            'categoria' => 'admin',
            'estado'  => 1,
        ]);

        DB::table('usuarios')->insert([
            'codigo' => 'codigo2',
            'nombre' => 'Usuario Dos',
            'direccion' => 'Calle Dos 456',
            'dui' => '23456789-2',
            'telefono' => '7856-5678',
            'email' => 'usuario2@example.com',
            'usuario' => 'jose',
            'password' => bcrypt('jose002'),
            'categoria' => 'user',
            'estado' => 1,
        ]);

        DB::table('usuarios')->insert([
            'codigo' => 'codigo3',
            'nombre' => 'Usuario Tres',
            'direccion' => 'Calle Tres 789',
            'dui' => '34567890-3',
            'telefono' => '7987-2345',
            'email' => 'usuario3@example.com',
            'usuario' => 'usuario3',
            'password' => bcrypt('contraseña3'),
            'categoria' => 'user',
            'estado' => 1,
        ]);

        DB::table('usuarios')->insert([
            'codigo' => 'codigo4',
            'nombre' => 'Usuario Cuatro',
            'direccion' => 'Calle Cuatro 012',
            'dui' => '45678901-4',
            'telefono' => '6789-4567',
            'email' => 'usuario4@example.com',
            'usuario' => 'usuario4',
            'password' => bcrypt('contraseña4'),
            'categoria' => 'Recepcionista',
            'estado' => 1,
        ]);

        DB::table('usuarios')->insert([
            'codigo' => 'codigo5',
            'nombre' => 'Usuario Cinco',
            'direccion' => 'Calle Cinco 345',
            'dui' => '56789012-5',
            'telefono' => '7864-4567',
            'email' => 'usuario5@example.com',
            'usuario' => 'usuario5',
            'password' => bcrypt('contraseña5'),
            'categoria' => 'user',
            'estado' => 0,
        ]);
    }
}
