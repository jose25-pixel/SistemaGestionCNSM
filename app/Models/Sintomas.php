<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sintomas extends Model
{
    use HasFactory;
    protected $table = "sintomas";
    protected $fillable = [
        'fecha_regis',
        'hora_regis',
        'sintoma',
        'conflicto',
        'id_consulta'
    ];
}
