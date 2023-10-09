<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsable', function (Blueprint $table) {
            $table->id();
            $table->string('nombrer');
            $table->string('estado_civilr');
            $table->string('nivel_educativor');
            $table->integer('edadr');
            $table->string('ocupacionr');
            $table->integer('nu_hermano');
            $table->string('lugar_ocupa');
            $table->integer('nu_hijo');
            $table->integer('edad_hijo');
            $table->string('nombre_conyugue');
            $table->integer('ano_casado');
            $table->unsignedBigInteger('id_paciente');
            $table->unsignedBigInteger('usuario_id');
            $table->timestamps();

            // Claves foráneas
            $table->foreign('id_paciente')->references('id')->on('paciente');
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
        Schema::dropIfExists('responsable');
    }
}
