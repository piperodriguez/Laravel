<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');//entero autoincremento
            $table->unsignedInteger('id_profesion')->nullable();
            $table->foreign('id_profesion')->references('id_profesion')->on('profesiones');
            $table->string('first_name');//estring
            $table->string('last_name');//estring
            $table->string('email')->unique();//metodo unique para no permitir dos emails iguales en la bd
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('is_admin')->default(false);
            $table->string('website')->nullable();
            $table->rememberToken();//tpñen de seguridad
            $table->timestamps();//hora y fecha de creacion
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
