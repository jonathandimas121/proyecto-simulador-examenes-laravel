<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idAlumno');
            $table->string('alumno');
            $table->unsignedBigInteger('idDocente');
            $table->string('docente');
            $table->unsignedBigInteger('idExamen');
            $table->string('tituloExamen');
            $table->integer('intentos');
            $table->integer('promedio');
            // $table->foreign('idAlumno')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('idDocente')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('idExamen')->references('id')->on('examenes')->onDelete('cascade');
            // $table->foreign('idAlumno')->references('id')->on('users');
            // $table->foreign('idDocente')->references('id')->on('users');
            // $table->foreign('idExamen')->references('id')->on('examenes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resultados');
    }
};
