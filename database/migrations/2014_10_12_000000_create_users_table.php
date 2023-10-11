<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 50)->nullable();
            $table->string('nombre', 50)->nullable();
            $table->text('direccion')->nullable();
            $table->string('dui', 50)->unique();
            $table->string('telefono', 15)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('usuario', 25)->nullable();
            $table->string('password',250);
            $table->string('categoria', 150);
            $table->integer('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
