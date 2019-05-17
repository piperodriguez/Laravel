<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;



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

        //FORMA NUMERO 1 constructor de consultas:
        //$users = DB::table('users')->get();
        
        //FORMA NUMERO 2 CON MODELO:
        $users = User::all(); 
    
        $msg = "Usuarios De la BD";

        return view('users')->with([
            'users' => $users,
            'title' => 'Listado de Usuarios',
            'mensaje' => $msg
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
