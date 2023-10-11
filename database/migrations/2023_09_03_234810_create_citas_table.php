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
            $table->string('paciente',250)->nullable();
            $table->string('dui',20)->unique();
            $table->string('celular',12)->nullable();
            $table->string('fecha',15);
            $table->string('hora',15);
            $table->string('email',50)->nullable();
            $table->text('motivo')->nullable();
            $table->integer('estado_cita');
            $table->string('terapeuta_id');
            $table->integer('usuario_id'); // Cambié 'terapeuta_id' a 'usuario_id'
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
