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

Route::get('/usuarios', function(){
	return 'Usuarios';
});

/*ahora creemos la ruta  para mirar la el detalle de un usuarios*/
Route::get('/usuarios/{id}', function($id){
	return "Mostrando detalle del usuario: {$id}";
})->where('id', '[0-9]+');

/*expresion regular utilizada en la condicion de la ruta tambien funciona esta \d */

Route::get('/usuarios/nuevo', function(){
	return'Crear nuevo Usuario';
}); 

/*routa con dos parametros*/

Route::get('/saludo/{nombre}/{username?}', function($nombre,$username = null){

	if ($username) {
		return "Bienvenido {$nombre}, tu nombre de usuario es {$username}";
	}else{
		return "Bienvenido {$nombre}, no cuentas con nombre de usuario";
	}
	
});



