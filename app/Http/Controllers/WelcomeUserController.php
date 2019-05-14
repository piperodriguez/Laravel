<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeUserController extends Controller
{
    //
    public function index($nombre,$username = null)
    {

    	$nombre = ucfirst($nombre);

		if ($username) {
			return "Bienvenido {$nombre}, tu nombre de usuario es {$username}";
		}else{
			return "Bienvenido {$nombre}, no cuentas con nombre de usuario";
		}
    }
}
