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
        Schema::create('correlativa_cursadas', function (Blueprint $table) {
            $table->id();
            $table->id_correlativa_debil();
            $table->id_materia();
            $table->id_correlativa_debil()->references('id')->on('materias')->onUpdate('cascade')->onDelete('cascade');
            $table->id_materia()->references('id')->on('materias')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('correlativa_cursadas');
    }
};
