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
            $table->string('nombrer',45)->nullable();
            $table->string('estado_civilr',30)->nullable();
            $table->string('nivel_educativor',30)->nullable();
            $table->integer('edadr')->nullable();
            $table->string('ocupacionr',45)->nullable();
            $table->integer('nu_hermano')->nullable();
            $table->string('lugar_ocupa',45)->nullable();
            $table->integer('nu_hijo')->nullable();
            $table->string('edad_hijo',30)->nullable();
            $table->string('nombre_conyugue',45)->nullable();
            $table->integer('ano_casado')->nullable();
            $table->unsignedBigInteger('id_paciente');
            $table->Integer('usuario_id');
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
