ENLACE DE MODELOAS A RUTAS EN LARAVEL

Laravel nos permite obtener modelos directamente en los parámetros de nuestras acciones, sin necesidad del llamado explícito a métodos de Eloquent como find or findOrFail, en esta lección veremos el uso de esta característica conocida como Route Model Binding:

En lugar de obtener el usuario utilizando los métodos find o findOrFail podemos obtenerlo directamente como parámetro de la acción:

public function show(User $user)
{
    return view('users.show', compact('user'));
}

public function show(User $user)
{
    return view('users.show', compact('user'));
}
Para que esto funcione, nota que el nombre del parámetro en la declaración de la ruta debe coincidir con el nombre del parámetro en la declaración del método:

Route::get('/usuarios/{user}', 'UserController@show');

// y en el controlador:

use App\User;

class UserController {

    public function show(User $user)
    {
        //...
    }

}

Route::get('/usuarios/{user}', 'UserController@show');
 
// y en el controlador:
 
use App\User;
 
class UserController {
 
    public function show(User $user)
    {
        //...
    }
 
}
Además el tipo del parámetro debe ser, por supuesto, un modelo de Eloquent (en nuestro ejemplo es App\User).