<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSintomasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sintomas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_regis');
            $table->time('hora_regis');
            $table->string('sintoma');
            $table->text('conflicto');
            $table->text('situacion');
            $table->unsignedBigInteger('id_consulta');
            $table->timestamps();

            // Clave foránea
            $table->foreign('id_consulta')->references('id')->on('consultas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sintomas');
    }
}
