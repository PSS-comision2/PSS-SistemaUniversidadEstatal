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
        Schema::create('correlativa_aprobadas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_correlativa_fuerte');
            $table->integer('id_materia');
            $table->integer('id_carrera');
            $table->foreign('id_correlativa_fuerte')->references('id')->on('materias')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_materia')->references('id')->on('materias')->onUpdate('cascade')->onDelete('cascade');
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
