<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->string('num_clinico',25);
            $table->string('fecha',25);
            $table->string('hora',25)->nullable();
            $table->string('motivo_consulta',200)->nullable();
            $table->string('genograma',200)->nullable();
            $table->text('aprox_diagnostico')->nullable();
            $table->unsignedBigInteger('paciente_id');
            $table->integer('usuario_id');
            $table->timestamps();

            // Claves foráneas
            $table->foreign('paciente_id')->references('id')->on('paciente');
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
        Schema::dropIfExists('consultas');
    }
}
