<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class conyuge extends Model
{
    //use HasFactory;


    protected $table = 'conyuge';
    protected $fillable = [
        'nombre',
        'nivel_educativo',
        'ocupacion',
        'edad',
        'numero_hijo',
        'edades',
        'id_paciente',
        'usuario_id'
    ];


}
