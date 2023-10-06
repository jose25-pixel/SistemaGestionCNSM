<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'paciente';
    protected $fillable = [
        'cod_paciente',
        'fecha_naci',
        'genero',
        'ocupacion',
        'lugar_estudio',
        'grado',
        'nivel_educativo',
        'direccion',
        'departamento',
        'municipio',
        'celular_uno',
        'celular_dos',
        'celular_tres',
        'fecha',
        'id_cita'
    ];

    //public function cita(){
      //  return $this->belongsTo('App\Cita');
   // }

    public function cita()
    {
        return $this->belongsTo('App\Cita', 'id_cita', 'id');
    }

}
