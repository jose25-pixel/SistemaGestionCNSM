<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConyugesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conyuge', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',50)->nullable();
            $table->string('nivel_educativo',150)->nullable();
            $table->string('ocupacion',150)->nullable();
            $table->integer('edad')->nullable();
            $table->integer('numero_hijo')->nullable();
            $table->string('edades',100)->nullable();
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
        Schema::dropIfExists('conyuges');
    }
}
