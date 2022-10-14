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
        Schema::create('dicta', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('legajo');
            $table->integer('id_materia');
            $table->foreign('legajo')->references('legajo')->on('profesores')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('dicta');
    }
};
