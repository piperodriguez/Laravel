En esta lección aprenderemos a crear rutas de tipo POST, las cuales harán referencias a acciones que típicamente alterarán el estado de nuestra aplicación (por ejemplo para la creación de registros). También veremos cómo evitar ataques de tipo CSRF utilizando una protección que ya viene incluida en el framework Laravel.
	 
CSRF:
La técnica llamada falsificación de petición en sitios cruzados, proviene de su nombre en inglés Cross Site Request Forgery (CSRF o XSRF). Este ataque fuerza al navegador web de su víctima, validado en algún servicio (como por ejemplo correo o home banking) a enviar una petición a una aplicación web vulnerable.


Rutas con el método POST
Declaramos una ruta de tipo POST utilizando el facade Route y llamando al método post():

Route::post('/usuarios/crear', 'UserController@store');
Route::post('/usuarios/crear', 'UserController@store');
Podemos tener dos rutas que utilicen la misma URL pero con diferentes métodos:

Route::get('/usuarios', 'UserController@index');

Route::post('/usuarios', 'UserController@create');

Route::get('/usuarios', 'UserController@index');
 
Route::post('/usuarios', 'UserController@create');
Para ver todas las rutas que tienes en tu aplicación puedes ejecutar en la consola el comando route:list de Artisan:

php artisan route:list
php artisan route:list
Token (CSRF)
El middleware VerifyCsrfToken nos permite evitar que terceros puedan enviar peticiones de tipo POST a nuestra aplicación y realizar ataques de tipo cross-site request forgery. Para agregar un campo con el token dentro de nuestro formulario, que le va a permitir a Laravel reconocer peticiones de formulario que sean válidas, debemos llamar al método csrf_field():

<form method="POST" action="{{ url('usuarios/crear') }}">
    {{ csrf_field() }}

    <button type="submit">Crear usuario</button>
</form>

<form method="POST" action="{{ url('usuarios/crear') }}">
    {{ csrf_field() }}
 
    <button type="submit">Crear usuario</button>
</form>
El método csrf_field() agregará un campo oculto llamado _token con el valor del token al código HTML de nuestro formulario.

Podemos desactivar la protección CSRF comentando la línea 36 del archivo Kernel.php aunque esto es altamente desaconsejado:

PHP
protected $middlewareGroups = [
    'web' => [
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        // \App\Http\Middleware\VerifyCsrfToken::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
    ]
   
    // ...
]
s
protected $middlewareGroups = [
    'web' => [
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        // \App\Http\Middleware\VerifyCsrfToken::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
    ]
   
    // ...
]