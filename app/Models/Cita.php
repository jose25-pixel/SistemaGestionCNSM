<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'citas';
    protected $fillable = [
        'paciente',
        'dui',
        'celular',
        'fecha',
        'hora',
        'email',
        'motivo',
        'estado_cita'
    ];
}
