<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'paciente';
    protected $fillable = [
        'fecha_naci',
        'genero',
        'ocupacion',
        'lugar_estudio',
        'grado',
        'nivel_educativo',
        'direccion',
        'departamento'
    ];
}
