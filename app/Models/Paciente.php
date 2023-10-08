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
        'edad',
        'fecha_reg',
        'genero',
        'ocupacion',
        'lugar_estudio',
        'grado',
        'nivel_educativo',
        'direccion',
        'departamento',
        'municipio',
        'celular_dos',
        'celular_tres',
        'id_cita',
        'usuario_id'
    ];

    //public function cita(){
      //  return $this->belongsTo('App\Cita');
   // }

    public function cita()
    {
        return $this->belongsTo(cita::class,'id_cita');
    }

}
