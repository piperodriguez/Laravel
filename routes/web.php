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

Route::get('/', function () {
    return view('welcome');
});
/*para que solo retornemos una cadena
Route::get('/', function () {
    return 'Bienvenido Juan Felipe';
});
*/

Route::get('/MyFirstView', function () {
    return view('MyFirstView');
});

Route::get('/usuarios', 'UserController@index');

/*ahora creemos la ruta que apunte al controlador y despues del arroba a un metodo*/

Route::get('/usuarios/{id}', 'UserController@show')->where('id', '[0-9]+');

Route::get('/usuarios/nuevo', 'UserController@create'); 

Route::get('/saludo/{nombre}/{username?}', 'welcomeUserController@index');


