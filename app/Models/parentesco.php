<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parentesco extends Model
{
    use HasFactory;


    protected $table = 'conyuge';
    protected $fillable = [
        'nombre_madre',
        'edad_madre',
        'estado_civilm',
        'nivel_educativom',
        'ocupacionm',
        'vivem',
        'nombrep',
        'edadp', 
        'estado_civilp', 
        'estado_civilp', 
        'estado_civilp',
        'ocupacionp', 
         
        'id_paciente',
        'usuario_id'
    ];
}
