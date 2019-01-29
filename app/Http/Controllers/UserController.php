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
    	
        // $users = User::all(); asi es para llamar un modelo obviamente de una tabla



        $users = [
            'Juan Felipe',
            'Yuri Vanessa',
            'Romano',
            'Edgardo Enrique',
            'Maria Isabella',
            'Don Adolfo',
            'Brayam Javier',
        ];

    	/*
        forma una

        return view('users', [
            'users' => $users,
            'title' => 'Listado de Usuarios'

        ]);*/
        //forma 2
        return view('users')->with([
            'users' => $users,
            'title' => 'Listado de Usuarios'
        ]);
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
