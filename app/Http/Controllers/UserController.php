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




       return view('usuarios/users')->with([
            'users' => $users,
            'title' => 'Listado de Usuarios',
            'mensaje' => $msg
        ]);
    }

    public function show(User $user)
    {

        /*TRADICIONAL PARA EL MANEJO DE 404*/
        //con base de datps

      /*  $user = User::find($id);
        
        if ($user == "") {    
            return response()->view('errors.404', [], 404);
            //envia tres parametro el primero la vista el segundo los datos que van vacioes y en el tercero el estado
        }*/

        /*FINDORFAIL METODO ERRORE 404*/
        

        //$user = User::findOrFail($id);

    	return view('usuarios.detalleuser', compact('user'));
        
    }

    public function create()
    {



    	return view('usuarios.FormNewUser');
    }



    public function save()
    {

        $dato = request()->all();

        User::create([
            'first_name' => $dato['first_name'],
            'last_name' => $dato['last_name'],
            'email' => $dato['email'],
            'password' => bcrypt($dato['password'])

        ]);

        return redirect()->route('usuarios');
    }




}
