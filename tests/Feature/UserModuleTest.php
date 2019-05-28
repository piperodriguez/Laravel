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
       $propfesion = Profesiones::select('id_profesion')->where(['titulo' => 'Back-End Developer'])->value('id_profesion');;

        //generar email aleatorio

        $length = 5;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $email = '';
        for ($i = 0; $i < $length; $i++) {
            $email .= $characters[rand(0, $charactersLength - 1)];
        }

        $email_all = $email.'@gmail.com';



        factory(User::class)->create([
          'first_name' => 'Lucho',
          'last_name' => 'Diaz',
          'password' => bcrypt('123456'),
          'is_admin' => false,
          'website' => 'www.solati.com.co',
          'id_profesion' => $propfesion,
          'email' =>  $email_all
        ]);
        //como se soliucita en la prueba que exista el usuario lucho se crea aqui mismo en las pruebas
      /*permite saber que esa ruta esta corriendo exitosamente osea en estado 200*/
        $this->get('/usuarios')
          ->assertStatus(200)
          ->assertSee('Usuarios')
          ->assertSee('Lucho');
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

        //generar email aleatorio

        $length = 5;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $email = '';
        for ($i = 0; $i < $length; $i++) {
            $email .= $characters[rand(0, $charactersLength - 1)];
        }

        $email_all = $email.'@gmail.com';

      $user = factory(User::class)->create([
        'first_name' => 'Ricardo',
        'last_name' => 'Arjona',
        'email' =>  $email_all
      ]);
      $this->get('/usuarios/'.$user->id)
      ->assertStatus(200)
      ->assertSee('Ricardo Arjona');
    }



    function it_shows_a_default_message_if_the_users_list_is_empty()
    {
        $this->get('/usuarios')
            ->assertStatus(200)
            ->assertSee('No hay usuarios registrados.');
    }





    function testMostrarError404_Si_Usuario_No_Existe()
    {
      $this->get('/usuarios/999')
      ->assertStatus(404)
      ->assertSee('Usuario no pudo ser encontrado');

    }

    /**
     * A basic test example.
     *
     * @test
     */

    function test_CrearNuevoUsuario()
    {
      //deshabilita el token del formulario en la prueba
      $this->withoutMiddleware();
     // $this->withoutExceptionHandling();

        $length = 5;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $email = '';
        for ($i = 0; $i < $length; $i++) {
            $email .= $characters[rand(0, $charactersLength - 1)];
        }

        $email_all = $email.'@gmail.com';


         $this->call('POST', '/usuarios/save', [
            'first_name' => 'pepe',
            'last_name' => 'rodriguez',
            'email' => $email_all,
            'password' => '123456'
          ])->assertRedirect('/usuarios/');


         $this->assertCredentials([
            'first_name' => 'pepe',
            'last_name' => 'rodriguez',
            'password' => '123456'
         ]);
    }

}