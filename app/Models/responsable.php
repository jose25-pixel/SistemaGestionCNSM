<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class responsable extends Model
{
    protected $table='responsable';

    protected $fillable = [
        'nombrer',
        'estado_civilr',
        'nivel_educativor',
        'edadr',
        'ocupacionr',
        'duir',
        'id_paciente',
        'usuario_id'
    ];
}
