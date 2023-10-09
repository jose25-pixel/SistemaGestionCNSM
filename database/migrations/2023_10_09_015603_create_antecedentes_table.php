<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntecedentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedentes_salud', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('patologia')->nullable();
            $table->string('enfergenetica')->nullable();
            $table->text('otros')->nullable();
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
        Schema::dropIfExists('antecedentes_salud');
    }
}
