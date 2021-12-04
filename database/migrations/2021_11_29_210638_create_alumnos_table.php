<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grado_id');
            $table->foreign('grado_id')->references('id')->on('grados');
            $table->string('Nombres');
            $table->string('PrimerApellido');
            $table->string('SegundoApellido');
            $table->integer('AñoIngreso');
            $table->string('CorreoElectronico');
            $table->integer('Edad');
            $table->date('FechaNacimiento');
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
        Schema::dropIfExists('alumnos');
    }
}
