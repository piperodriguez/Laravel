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
            $table->string('name');//estring
            $table->string('email')->unique();//metodo unique para no permitir dos emails iguales en la bd
            $table->string('profesion', 100)->nullable();//como segundo parametro el tamaño de caracters permtidiso y permitimos que se null
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
