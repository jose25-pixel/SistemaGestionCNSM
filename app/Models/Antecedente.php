<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antecedente extends Model
{


    use HasFactory;


    protected $table = 'antecedentes_salud';
    protected $fillable = [
        'fecha',
        'patologias',
        'enfergenetica',
        'otros',
        'iniciotrabajar',
        'trabaja',
        'trabaja_actualmente',
        'duracion_empleo',
        'despedido',
        'causa',
        'satisfecho',
        'id_paciente',
        'usuario_id'
    ];
}
