<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


//======================================================================
//Comando Crear Controlador: php artisan make:controller UserController
//======================================================================

class UserController extends Controller
{
    public function index()
    {
    	//-----------------------------------------------------
		//Metodo para mirar la el detalle de un usuarios 
		//-----------------------------------------------------
    	
    	return 'Usuarios';
    }

    public function show($id)
    {
    	return "Mostrando detalle del usuario: {$id}";
    }

    public function create()
    {
    	return'Crear nuevo Usuario';	
    }
}
