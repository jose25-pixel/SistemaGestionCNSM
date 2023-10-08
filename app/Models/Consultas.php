<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultas extends Model
{
    use HasFactory;
    protected $table = "consulta";
    protected $fillable = [
        'num_clinico',
        'fecha',
        'hora',
        'motivo_consulta',
        'genograma',
        'aprox_diagnostico',
        'id_paciente',
        'usuario_id'
    ];
}
