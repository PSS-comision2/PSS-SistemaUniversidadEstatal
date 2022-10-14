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
        Schema::create('tiene', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('id_carrera');
            $table->integer('codigo_materia');
            $table->foreign('id_carrera')->references('id')->on('carreras')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('tiene');
    }
};
