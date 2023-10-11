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
            $table->string('cod_paciente',50);
            $table->string('fecha_naci',25)->nullable();
            $table->integer('edad')->nullable();
            $table->string('fecha_reg',25);
            $table->string('genero',15)->nullable();
            $table->string('ocupacion',150)->nullable();
            $table->string('lugar_estudio',150)->nullable();
            $table->string('grado',100)->nullable();
            $table->string('nivel_educativo',100)->nullable();
            $table->string('direccion',200)->nullable();
            $table->string('departamento',100)->nullable();
            $table->string('municipio',100)->nullable();
            $table->string('celular_dos',12)->nullable();
            $table->string('celular_tres', 12)->nullable();
            $table->interger('nu_hermano',)->nullable();
            $table->string('lugar_ocupa', 50)->nullable();
            $table->integer('nu_hijo')->nullable();
            $table->string('edad_hijo',30)->nullable();
            $table->integer('ano_casado')->nullable();
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
