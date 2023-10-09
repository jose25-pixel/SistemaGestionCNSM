<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentescosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parentesco', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_madre')->nullable();
            $table->integer('edad_madre')->nullable();
            $table->string('estado_civilm')->nullable();
            $table->string('nivel_educativom')->nullable();
            $table->string('ocupacionm')->nullable();
            $table->string('vivem')->nullable();
            $table->string('nombrep')->nullable();
            $table->integer('edadp')->nullable();
            $table->string('estado_civilp')->nullable();
            $table->string('ocupacionp')->nullable();
            $table->string('nivel_educativop')->nullable();
            $table->string('vivep')->nullable();
            $table->unsignedBigInteger('id_paciente');
            $table->unsignedBigInteger('usuario_id');
            $table->timestamps();

            // Claves foráneas
            $table->foreign('id_paciente')->references('id')->on('paciente');
          //  $table->foreign('usuario_id')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parentescos');
    }
}
