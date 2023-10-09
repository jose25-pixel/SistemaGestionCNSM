<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antecedente extends Model
{


    use HasFactory;


    protected $table = 'antecedentes_salud';
    protected $fillable = [
        'fecha',
        'patologia',
        'enfergenetica',
        'otros',
        'id_paciente',
        'usuario_id'
    ];
}
