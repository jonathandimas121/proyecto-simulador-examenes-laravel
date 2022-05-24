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
        Schema::create('examenes', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->id();
            $table->string('titulo');
            $table->unsignedBigInteger('idUsuario');
            $table->string('nombreUsuario');
            // $table->foreign('idUsuario')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('idUsuario')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examenes');
    }
};
