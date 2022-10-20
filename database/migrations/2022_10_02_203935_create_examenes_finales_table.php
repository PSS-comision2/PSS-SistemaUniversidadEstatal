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
        Schema::create('examenes_finales', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('fecha');
            $table->time('hora');
            $table->string('ubicacion');
            $table->string('observacion')->nullable();
            $table->integer('id_profesor');
            $table->integer('id_materia');
            $table->foreign('id_profesor')->references('id')->on('profesores')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_materia')->references('id')->on('materias')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examenes_finales');
    }
};
