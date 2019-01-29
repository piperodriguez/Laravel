<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserModuleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    function testValidacionTextoRuta()
    {
    	/*permite saber que esa ruta esta corriendo exitosamente osea en estado 200*/
        $this->get('/usuarios')
        	->assertStatus(200)
        	->assertSee('Usuarios')
            ->assertSee('Yuri Vanessa')/*se valida desde un arreglo en el controlador que valide este nombre impreso en la vista*/
            ->assertSee('Romano');
        	/*ademas comprueba que si esta retornando el texto Usuarios*/

    }


}
