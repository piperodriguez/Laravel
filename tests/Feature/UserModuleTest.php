<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Profesiones;

class UserModuleTest extends TestCase
{
  //para los test en la base de datos de prueba
//ahorra ejecutar la migracion
    //use RefreshDatabase;

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
       $propfesion = Profesiones::select('id_profesion')->where(['titulo' => 'Back-End Developer'])->value('id_profesion');

        factory(User::class)->create([
          'first_name' => 'Lucho',
          'last_name' => 'Diaz',
          'email' => 'lagloriadelucho@gmail.com',
          'password' => bcrypt('123456'),
          'is_admin' => false,
          'website' => 'www.solati.com.co',
          'id_profesion' => $propfesion

        ]);
        //como se soliucita en la prueba que exista el usuario lucho se crea aqui mismo en las pruebas
    	/*permite saber que esa ruta esta corriendo exitosamente osea en estado 200*/
        $this->get('/usuarios')
        	->assertStatus(200)
        	->assertSee('Usuarios')
          ->assertSee('lucho');
        	/*ademas comprueba que si esta retornando el texto Usuarios*/

    }

   /*
  ASH ESTA PRUEBA ME LIMPIA LA TABLA NO RECONOCE LA BASE DE DATOS DE PRUEBA
   function testValidacionMensajeListaUsuarios()
    {
        /*permite saber que esa ruta esta corriendo exitosamente osea en estado 200*/
        //veñirifica que existan usuarios en la consukta reakuzada

        /*$this->get('/usuarios')
            ->assertStatus(200)
            ->assertSee('No hay usuarios registrados');

    }*/


    function testDetalleUsuario()
    {

      $user = factory(User::class)->create([
        'first_name' => 'Ricardo',
        'last_name' => 'Arjona',

      ]);

      $this->get('/usuarios/'.$user->id)
      ->assertStatus(200)
      ->assertSee('Ricardo Arjona');

    }

}
