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
        'estado_cita',
        'terapeuta_id',
        'usuario_id'
    ];

   // public function paciente()
    //{
      //  return $this->hasMany('App\Paciente');
   // }


    public function paciente()
    {
        return $this->hasMany(Paciente::class,'id');
    }
}
