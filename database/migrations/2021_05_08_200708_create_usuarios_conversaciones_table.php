<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosConversacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

            Schema::create('usuarios_conversaciones', function (Blueprint $table) {

                $table->primary(['id_usuario', 'id_conv']);

                $table->foreignId('id_usuario')
                        ->references('id')
                        ->on('users')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');

                $table->foreignId('id_conv')
                        ->references('id')
                        ->on('conversaciones')
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
        Schema::drop('usuarios_conversaciones');

    }
}
