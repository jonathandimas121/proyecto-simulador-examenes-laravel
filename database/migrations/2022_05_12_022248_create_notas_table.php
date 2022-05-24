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
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idResultado');
            $table->unsignedBigInteger('idAlumno');
            $table->string('alumno');
            $table->unsignedBigInteger('idDocente');
            $table->string('docente');
            $table->string('tituloExamen');
            $table->integer('numIntento');
            $table->integer('calificacion');
            // $table->foreign('idResultado')->references('id')->on('resultados')->onDelete('cascade');
            // $table->foreign('idAlumno')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('idDocente')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('idResultado')->references('id')->on('resultados');
            // $table->foreign('idAlumno')->references('id')->on('users');
            // $table->foreign('idDocente')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notas');
    }
};
