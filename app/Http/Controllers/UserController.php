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


        /*Se prepara validacion para enviar el arreglo solo si esta con datos*/

        if (request()->has('empty')) {

            $users = [];

        }else{

            $users = [
                'Juan Felipe',
                'Yuri Vanessa',
                'Romano',
                'Edgardo Enrique',
                'Maria Isabella',
                'Don Adolfo',
                'Brayam Javier',
                'Bellita de Mi Sweet'
            ];
        }
            //se pregunta si la peticion contiene el campo empty        
        return view('users')->with([
            'users' => $users,
            'title' => 'Listado de Usuarios'
        ]);
    }

    public function show($id)
    {

        $msg = "Mostrando detalle del usuario:";

        return view('usuario-detalle',[
            'id' => $id,
            'msg' => $msg

        ]);

    }

    public function create()
    {
    	return'Crear nuevo Usuario';	
    }
}
