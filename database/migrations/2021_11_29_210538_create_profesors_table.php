<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesors', function (Blueprint $table) {
            $table->id();
            $table->string('Nombres');
            $table->string('PrimerApellido');
            $table->string('SegundoApellido');
            $table->string('Telefono');
            $table->string('CorreoElectronico');
            $table->float('Sueldo');
            $table->unsignedBigInteger('grado_id');
            $table->foreign('grado_id')->references('id')->on('grados');
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
        Schema::dropIfExists('profesors');
    }
}
