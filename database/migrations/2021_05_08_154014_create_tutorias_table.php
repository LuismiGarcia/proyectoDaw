<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutorias', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_curso')
                    ->references('id')
                    ->on('cursos')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->string("enlaceMeet");
            $table->text("resumen");
            $table->date("fecha");
            $table->time("hora");
            $table->string("preg_alumnos");
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
        Schema::drop('tutorias');

    }
}
