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
            $table->string('nombre_madre',25)->nullable();
            $table->integer('edad_madre')->nullable();
            $table->string('estado_civilm',25)->nullable();
            $table->string('nivel_educativom',100)->nullable();
            $table->string('ocupacionm',150)->nullable();
            $table->string('vivem',25)->nullable();
            $table->string('nombrep',20)->nullable();
            $table->integer('edadp')->nullable();
            $table->string('estado_civilp',25)->nullable();
            $table->string('ocupacionp',30)->nullable();
            $table->string('nivel_educativop',30)->nullable();
            $table->string('vivep',30)->nullable();
            $table->unsignedBigInteger('id_paciente');
            $table->Integer('usuario_id');
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
