<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WelcomeUsersTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @test
     */

    /*Pruebas frodrigues de test*/
    /*
    * Que se encarga de valudar
    * que se muestre un mensaje
    * de bienvenida al usuario
    **/
    function BienvenidoUsuarioRegistrado()
    {
        $this->get('/saludo/Felipe/frodriguez')
        ->assertStatus(200)
        ->assertSee('Bienvenido Felipe, tu nombre de usuario es frodriguez');
    }
    /**
     * A basic feature test example.
     *
     * @test
     */

    function BienvenidaUsuarioNoRegistrado()
    {
        $this->get('/saludo/Felipe')
        ->assertStatus(200)
        ->assertSee('Bienvenido Felipe');
    }


}
