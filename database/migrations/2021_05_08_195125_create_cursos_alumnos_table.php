<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos_alumnos', function (Blueprint $table) {

            $table->primary(['id_curso','id_alumno']);

            $table->foreignId('id_curso')
                    ->references('id')
                    ->on('cursos')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreignId('id_alumno')
                    ->references('id')
                    ->on('alumnos')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cursos_alumnos');
    }
}
