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

    function test_cargaexitosaFormularioNuevoUsuario()
    {
      $this->get('/usuarios/nuevo')
      ->assertStatus(200)
      ->assertSee('Creacion de un nuevo usuario');
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
       $this->withoutExceptionHandling();

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


      function test_campoNombreRequerido()
      {
          $this->withoutMiddleware();
          //$this->withoutExceptionHandling();

          //DB::table('users')->truncate();


          $response = $this->from(route('users.nuevo'))
          ->post('/usuarios/save', [
            'first_name' => '',
            'last_name' => 'sanchez',
            'email' => 'juan@gmail.com',
            'password' => bcrypt('laravel')
          ])->assertRedirect(route('users.nuevo'))
          ->assertSessionHasErrors(['first_name' => 'el campo first_name es obligatorio']);

          $response = $this->assertDatabaseMissing('users', [
            'email' => 'juan@gmail.com'
          ]);


      }

      function test_campoEmailRequerido()
      {
          $this->withoutMiddleware();
          //$this->withoutExceptionHandling();

          //DB::table('users')->truncate();


          $response = $this->from(route('users.nuevo'))
          ->post('/usuarios/save', [
            'first_name' => 'Dulio',
            'last_name' => 'sanchez',
            'email' => '',
            'password' => bcrypt('laravel')
          ])->assertRedirect(route('users.nuevo'))
          ->assertSessionHasErrors(['email' => 'el campo email es obligatorio']);

          $response = $this->assertDatabaseMissing('users', [
            'email' => 'juan@gmail.com'
          ]);


      }

      function test_campoEmailNoValido()
      {
          $this->withoutMiddleware();
          //$this->withoutExceptionHandling();

          //DB::table('users')->truncate();


          $response = $this->from(route('users.nuevo'))
          ->post('/usuarios/save', [
            'first_name' => 'Dulio',
            'last_name' => 'sanchez',
            'email' => 'No-Vaslido',
            'password' => bcrypt('laravel')
          ])->assertRedirect(route('users.nuevo'))
          ->assertSessionHasErrors(['email']);

          $response = $this->assertDatabaseMissing('users', [
            'email' => 'No-Vaslido'
          ]);


      }


      /*function test_campoEmailUnicoBD()
      {
          $this->withoutMiddleware();
         // $this->withoutExceptionHandling();

          //DB::table('users')->truncate();
          factory(User::class)->create([
            'first_name' => 'Ivan',
            'last_name' => 'Aguilar',
            'email' => 'vargasjuan367@gmail.com'
          ]);

          $response = $this->from(route('users.nuevo'))
          ->post('/usuarios/save', [
            'email' => 'vargasjuan367@gmail.com',
            'password' => bcrypt('laravel')
          ])->assertRedirect(route('users.nuevo'))
          ->assertSessionHasErrors(['email']);


         //  $response = $this->assertEquals(0, User::count());


          $response = $this->assertDatabaseHas('users', [
            'email' => 'vargasjuan367@gmail.com'
          ]);


      }*/


      function test_campoPasswordRequerido()
      {
          $this->withoutMiddleware();
//        $this->withoutExceptionHandling();

          //DB::table('users')->truncate();


          $response = $this->from(route('users.nuevo'))
          ->post('/usuarios/save', [
            'first_name' => 'Kraken',
            'last_name' => 'sanchez',
            'email' => 'uan@gmail.com',
            'password' =>''
          ])->assertRedirect(route('users.nuevo'))
          ->assertSessionHasErrors(['password']);

          $response = $this->assertDatabaseMissing('users', [
            'first_name' => 'Kraken'
          ]);


      }

      function test_it_loads_the_edit_user_page()
      {
          $response = $this->withoutExceptionHandling();

          $user = factory(User::class)->create();
          $response = $this->get("usuarios/{$user->id}/editar");
          $response->assertStatus(200);
          $response->assertViewIs('usuarios.FormEditar');
          $response->assertSee('Editar Usuario');
          $response->assertViewHas('user', function($viewUser) use ($user){
            return $viewUser->id == $user->id;
          });
      }


    function test_ActualizarUsuario()
    {
      //deshabilita el token del formulario en la prueba
     // $this->withoutMiddleware();
       

        //  $this->withoutExceptionHandling();
         
        $user = factory(User::class)->create();

         //el metodo put actualizar put

        $id = $user["id"];

         $this->call('put', "/usuarios/{$user->id}", [
            'first_name' => 'Edgardo',
            'last_name' => 'Rodríguez',
            'password' => '123456'
          ])->assertRedirect('/usuarios/'.$id);


         $this->assertCredentials([
            'first_name' => 'Edgardo',
            'last_name' => 'Rodríguez',
            'password' => '123456'
         ]);
    }



    function test_Updatenombrerequerido()
    {
      //$this->withoutExceptionHandling();

      $user = factory(User::class)->create();

      $id = $user["id"];
      
      $this->from("usuarios/{$user->id}/editar")
      ->put("usuarios/".$user["id"],[
            'first_name' => '',
            'last_name' => 'Rodríguez',
            'email' => 'edgardorodriguezzabala@hotmail.com',
            'password' => '123456'
      ])
      ->assertRedirect("usuarios/".$id."/editar")
      ->assertSessionHasErrors(['first_name']);


      $this->assertDatabaseMissing('users', ['email' => 'edgardorodriguezzabala@hotmail.com']);


    }


    function test_Updateapellidorequerido()
    {
      //$this->withoutExceptionHandling();

      $user = factory(User::class)->create();

      $id = $user["id"];
      
      $this->from("usuarios/{$user->id}/editar")
      ->put("usuarios/".$user["id"],[
            'first_name' => 'Romano',
            'last_name' => '',
            'email' => 'edgardorodriguezzabala@hotmail.com',
            'password' => '123456'
      ])
      ->assertRedirect("usuarios/".$id."/editar")
      ->assertSessionHasErrors(['last_name']);


      $this->assertDatabaseMissing('users', ['email' => 'edgardorodriguezzabala@hotmail.com']);


    }


    function test_Updatepasswordrequerido()
    {
      //$this->withoutExceptionHandling();

      $user = factory(User::class)->create();

      $id = $user["id"];
      
      $this->from("usuarios/{$user->id}/editar")
      ->put("usuarios/".$user["id"],[
            'first_name' => 'Romano',
            'last_name' => 'Vargas',
            'password' => '',
            'email' => 'edgardorodriguezzabala@hotmail.com',
      ])
      ->assertRedirect("usuarios/".$id."/editar")
      ->assertSessionHasErrors(['password']);


      $this->assertDatabaseMissing('users', ['email' => 'edgardorodriguezzabala@hotmail.com']);


    }

     function test_campoUpdateEmailNoValido()
      {
       //  $this->withoutExceptionHandling();
      $user = factory(User::class)->create();

      $id = $user["id"];
      
      $this->from("usuarios/".$id."/editar")
      ->put("usuarios/".$user["id"],[
            'first_name' => 'Nombre Actualizado',
            'last_name' => 'Vargas',
            'password' => '123',
            'email' => 'edstmail.com',
      ])
      ->assertRedirect("usuarios/".$id."/editar")
      ->assertSessionHasErrors(['email']);


      $this->assertDatabaseMissing('users', ['first_name' => 'Nombre Actualizado']);

      }


      function test_campoUpdateEmailRequerido()
      {
         // $this->withoutMiddleware();
          //$this->withoutExceptionHandling();

          //DB::table('users')->truncate();


      $user = factory(User::class)->create();

      $id = $user["id"];
      
      $this->from("usuarios/".$id."/editar")
      ->put("usuarios/".$user["id"],[

            'first_name' => 'Nombre Actualizado',
            'last_name' => 'Vargas',
            'password' => '123',
            'email' => '',
      ])
      ->assertRedirect("usuarios/".$id."/editar")
      ->assertSessionHasErrors(['email']);


      $this->assertDatabaseMissing('users', ['first_name' => 'Nombre Actualizado']);

      }

     function test_updateMismoCorreo()
      {

        self::markTestIncomplete();
        return;

        $user = factory(User::class)->create([
          'email' => 'romanostyle@hotmail.com'
        ]);        

        $this->from("usuarios/{$user->id}/editar")
        ->put("usuarios/{$user->id}",[
          'first_name' => 'motas',
          'last_name' => 'rodriguez',
          'email' => 'romanostyle@hotmail.com',
          'password' => 'romano'
         ]);


      }  

}


