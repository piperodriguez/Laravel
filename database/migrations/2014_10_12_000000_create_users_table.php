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
            $table->increments('id');//Intenger unico y autoincremento
            $table->string('name');// Varchar
            $table->string('email')->unique();//varchar pero llama el metodo unique osea no puede haber 2 usuarios con el mismo emailñ
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();// no representa una columna como de seguridad o algo asi en autenticacion en ejemplo serviria larabel utilia esto para crear ese codigo supongo
            $table->timestamps();//marcad de tiempo 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*para eliminar */
        Schema::dropIfExists('users');
    }
}
