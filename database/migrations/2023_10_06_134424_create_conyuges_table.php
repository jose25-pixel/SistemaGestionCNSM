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
            $table->string('nombre')->nullable();
            $table->string('nivel_educativo')->nullable();
            $table->string('ocupacion')->nullable();
            $table->integer('edad')->nullable();
            $table->integer('numero_hijo')->nullable();
            $table->text('edades')->nullable();
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
        Schema::dropIfExists('conyuges');
    }
}
