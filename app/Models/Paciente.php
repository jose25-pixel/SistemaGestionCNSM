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
        'nu_hermano',
        'lugar_ocupa',
        'nu_hijo',
        'edad_hijo',
        'ano_casado',
        'id_cita',
        'usuario_id'
    ];

    //public function cita(){
      //  return $this->belongsTo('App\Cita');
   // }


   // Funcion de relacion con el modelo de cita
    public function cita()
    {
        return $this->hasOne(Cita::class,'id');
    }

    // Funcion de relacion con el modelo parentesco
    
    public function parentesco()
    {
        return $this->hasOne(parentesco::class, 'id');
    }
    
     // Funcion de relacion con el modelo conyuge

    public function conyuge()
    {
        return $this->hasOne(conyuge::class, 'id');
    }


    // Funcion de relacion con el modelo responsable

    public function responsable()
    {
        return $this->hasOne(responsable::class, 'id');
    }


    // Funcion de relacion con el modelo Adicciones

    public function Adiccione()
    {
        return $this->hasOne(Adicciones::class, 'id');
    }

 // Funcion de relacion con el modelo Adicciones

    public function Atecedente()
    {
        return $this->hasOne(Antecedente::class, 'id');
    }


    
}


