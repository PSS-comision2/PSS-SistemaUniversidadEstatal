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
        Schema::create('inscripto', function (Blueprint $table) {
            $table->integer('LU_alumno');
            $table->integer('id_carrera');
            $table->foreign('LU_alumno')->references('LU')->on('alumnos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_carrera')->references('id')->on('carreras')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('correlativa_aprobadas');
    }
};
