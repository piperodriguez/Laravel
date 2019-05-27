Verificar de forma manual que nuestros formularios funcionen correctamente puede llegar a ser complicado, más aún si nuestra aplicación crece y acabamos teniendo diferentes formularios con multiples campos en cada uno, además ¿Qué sucede si estamos trabajando en una API y nuestra aplicación de Laravel no tiene ningún formulario? A pesar de que existen apps y plugins como Postman, que nos permiten probar peticiones de tipo POST, en esta lección veremos cómo podemos verificar el funcionamiento de rutas de tipo POST utilizando pruebas automatizadas.
 
ejecutar una solo test

test --filter testCrearNuevoUsuario


Utilizando $this->post() podemos simular peticiones POST desde una prueba automatizada. En este caso, agregamos una nueva prueba para comprobar que podemos acceder a la ruta para crear usuarios y que también podemos crear nuevos usuarios:

/** @test */
function it_creates_a_new_user()
{
    $this->post('/usuarios/', [
        'name' => 'Duilio',
        'email' => 'duilio@styde.net',
        'password' => '123456'
    ])->assertRedirect('usuarios');
}


/** @test */
function it_creates_a_new_user()
{
    $this->post('/usuarios/', [
        'name' => 'Duilio',
        'email' => 'duilio@styde.net',
        'password' => '123456'
    ])->assertRedirect('usuarios');
}
Como primer argumento pasamos la URL (en este caso /usuarios) y como segundo argumento los datos de la petición. Con assertRedirect() comprobamos que el usuario sea redirigido a la URL dada.

Al método assertRedirect() podemos pasar como argumento el helper route para utilizar el nombre de una ruta en lugar de una URL:

assertRedirect(route('users.index'));

assertRedirect(route('users.index'));
Para comprobar que se ha creado un usuario con los datos que hemos pasado en la petición POST, utilizaremos el método assertDatabaseHas. Como primer argumento pasamos el nombre de la tabla y como segundo argumento los datos que esperamos encontrar:

$this->assertDatabaseHas('users', [
    'name' => 'Duilio',
    'email' => 'duilio@styde.net'
]);

$this->assertDatabaseHas('users', [
    'name' => 'Duilio',
    'email' => 'duilio@styde.net'
]);
En este caso esperamos encontrar dentro de la tabla users, un registro con un campo name igual a Duilio y un campo email igual a duilio@styde.net.

También podemos utilizar el método assertCredentials(), que nos permite comprobar la presencia de la contraseña correcta. Como primer argumento pasamos un array con los datos que esperamos encontrar. A este método no hace falta pasarle el nombre de la tabla, siempre y cuando estemos utilizando la tabla de usuarios por defecto (users):

$this->assertCredentials([
    'name' => 'Duilio',
    'email' => 'duilio@styde.net',
    'password' => '123456'
]);

$this->assertCredentials([
    'name' => 'Duilio',
    'email' => 'duilio@styde.net',
    'password' => '123456'
]);
Para recibir los datos de la petición dentro del controlador podemos utilizar el método request():

$data = request()->all();

// Luego de esto podemos acceder a los datos:

$data['name'];

$data = request()->all();
 
// Luego de esto podemos acceder a los datos:
 
$data['name'];
Utilizando redirect() podemos redirigir a otra parte de la aplicación desde el controlador:

PHP
return redirect('usuarios'); // Redirigimos a la URL "/usuarios"

return redirect()->route('users.index'); // Redirigimos a la ruta con el nombre "users.index"

return redirect('usuarios'); // Redirigimos a la URL "/usuarios"
 
return redirect()->route('users.index'); // Redirigimos a la ruta con el nombre "users.index"