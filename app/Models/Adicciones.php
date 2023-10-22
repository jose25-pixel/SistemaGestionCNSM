<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adicciones extends Model
{
    use HasFactory;

    protected $tabla='adicciones';
    protected $fillable = [
        'fecha',
        'atencioncnsm',
        'tratamientos',
        'tipotratamiento',
        'nombreatendio',
        'direcionatendio',
        'telefonoatendio',
        'tratamientorec',
        'tipofarmaco',
        'tipo_sustancia',
        'tiempo_consumo',
        'adiccion',
        'id_paciente',
        'usuario_id'
    ];
}
