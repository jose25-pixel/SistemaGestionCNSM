<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paciente', function (Blueprint $table) {
            $table->id();
            $table->string('cod_paciente');
            $table->date('fecha_naci')->nullable();
            $table->integer('edad')->nullable();
            $table->date('fecha_reg');
            $table->string('genero')->nullable();
            $table->string('ocupacion')->nullable();
            $table->string('lugar_estudio')->nullable();
            $table->string('grado')->nullable();
            $table->string('nivel_educativo')->nullable();
            $table->string('direccion')->nullable();
            $table->string('departamento')->nullable();
            $table->string('municipio')->nullable();
            $table->string('celular_dos')->nullable();
            $table->string('celular_tres')->nullable();
            $table->unsignedBigInteger('id_cita');
            $table->unsignedBigInteger('usuario_id');
            $table->timestamps();

            // Claves foráneas
            $table->foreign('id_cita')->references('id')->on('citas');
           // $table->foreign('usuario_id')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paciente');
    }
}
