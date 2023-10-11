<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parentesco extends Model
{
    use HasFactory;


    protected $table = 'parentesco';
    protected $fillable = [
        'nombre_madre',
        'edad_madre',
        'estado_civilm',
        'nivel_educativom',
        'ocupacionm',
        'vivem',
        'duim',
        'notam',
        'viveaunm',
        'nombrep',
        'edadp', 
        'estado_civilp', 
        'ocupacionp', 
        'nivel_educativop',
        'vivep',
        'duip',
        'notap',
        'viveaunp',
        'id_paciente',
        'usuario_id'
    ];
}
