<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*para que solo retornemos una cadena
Route::get('/', function () {
    return 'Bienvenido Juan Felipe';
});
*/

Route::group(['middleware' => ['web']], function(){
	Route::get('/', function () {
	    return view('welcome');
	});
	Auth::routes();
	Route::get('/home', 'HomeController@index')->name('home');
});

Route::get('/MyFirstView', function () {
    return view('MyFirstView');
});

Route::get('/profesiones', 'ProfesionesController@index',function() {
	return view('profesiones');
});


Route::get('/usuarios', 'UserController@index')->name('usuarios');

/*ahora creemos la ruta que apunte al controlador y despues del arroba a un metodo*/

Route::get('/usuarios/{user}', 'UserController@show')
->where('user', '[0-9]+')
->name('users.show');

/*ENvio de rutas POST seguras*/

Route::get('/usuarios/nuevo', 'UserController@create')->name('users.nuevo');//vista formulario

Route::post('/usuarios/save', 'UserController@save');//ejecutcuin del formulario

Route::get('usuarios/{user}/editar', 'UserController@editUser')->name('usuarios.editar');

//Ruta para ejecutar la actualizacion del usuario
Route::put('usuarios/{user}', 'UserController@updateUser');

Route::get('/saludo/{nombre}/{username?}', 'WelcomeUserController@index');

