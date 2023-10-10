<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id('id', 11);
            $table->string('paciente')->nullable();
            $table->string('dui');
            $table->string('celular')->nullable();
            $table->date('fecha');
            $table->string('hora');
            $table->string('email')->nullable();
            $table->text('motivo')->nullable();
            $table->integer('estado_cita');
            $table->string('terapeuta_id');
            $table->unsignedBigInteger('usuario_id'); // Cambié 'terapeuta_id' a 'usuario_id'
            $table->timestamps();

            // Clave foránea
            //$table->foreign('usuario_id')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citas');
    }
}
