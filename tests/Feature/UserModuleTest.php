<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserModuleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @test
     */
    function testValidacionTextoRuta()
    {
       /*sirve para verificar que exista usuario en la vista usuarios con el nombre lucho
        asi no exista en la bade de datos
       */ 
        factory(User::class)->create([
          'first_name' => 'Lucho',
          'last_name' => 'Diaz',
          'email' => 'lagloriadelucho@gmail.com',
          'password' => bcrypt('123456'),
          'is_admin' => false,
          'id_profesion' => 5
            
        ]);
        
    	/*permite saber que esa ruta esta corriendo exitosamente osea en estado 200*/
        $this->get('/usuarios')
        	->assertStatus(200)
        	->assertSee('Usuarios')
            ->assertSee('Yuri Vanessa')/*se valida desde un arreglo en el controlador que valide este nombre impreso en la vista*/
            ->assertSee('UsuarioDePrueba')
            ->assertSee('lucho');
        	/*ademas comprueba que si esta retornando el texto Usuarios*/

    }

    function testValidacionMensajeListaUsuarios()
    {
        /*permite saber que esa ruta esta corriendo exitosamente osea en estado 200*/
        //veñirifica que existan usuarios en la consukta reakuzada
        DB::table('users')->truncate();
        
        $this->get('/usuarios')
            ->assertStatus(200)
            ->assertSee('No hay usuarios registrados');

    }

}
