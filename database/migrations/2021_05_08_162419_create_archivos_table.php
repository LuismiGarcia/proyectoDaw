<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivos', function (Blueprint $table) {
            $table->increments('id');


            $table->foreignId('id_unidad')
                ->references('numero')
                ->on('unidades')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('nombre');
            $table->string('ruta_apuntes');
            $table->string('ruta_tareas');
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
        Schema::drop('archivos');

    }
}
