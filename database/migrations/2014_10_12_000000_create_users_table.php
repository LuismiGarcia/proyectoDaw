<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_role')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('name');
            $table->string('apellido1');
            $table->string('apellido2');
            $table->string('email');
            $table->string('dni')->unique();
            $table->string('password');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
