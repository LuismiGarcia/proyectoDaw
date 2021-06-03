<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_nivel')
                    ->references('id')
                    ->on('niveles')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreignId('id_tipo')
                    ->references('id')
                    ->on('tipos')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreignId('id_profesor')
                    ->references('id')
                    ->on('profesores')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->string("nombre");
            $table->text("resumen");
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
        Schema::dropIfExists('cursos');
    }
}
