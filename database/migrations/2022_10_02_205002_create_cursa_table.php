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
        Schema::create('cursa', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('fecha_inicio');
            $table->integer('LU_alumno');
            $table->integer('codigo_materia');
            $table->foreign('LU_alumno')->references('LU')->on('alumnos')->onUpdate('cascade')->onDelete('cascade'); 
            $table->foreign('codigo_materia')->references('codigo')->on('materias')->onUpdate('cascade')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursa');
    }
};
