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
    //metodo que me lleva al formulario
    public function create()
    {

    	return view('usuarios.FormNewUser');
    }

    //metodo que guarda el formulario xdddd

    public function save()
    {

       // $dato = request()->all();
        /*valida que el campo nombre venga con valor o lo redirecciona a la vista del formulario withwerrors es para mandar los errores al test*/
       /* if (empty($dato['first_name'])) {
            return redirect()->route('users.nuevo')->withErrors([
                'first_name' => 'el campo es obligatorio'
            ]);

        }*/
        $dato = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required','email','unique:users,email'],
            'password' => ['required','min:6']
        ],[
            'first_name.required' => 'el campo first_name es obligatorio',
            'last_name.required' => 'el campo last_name es obligatorio',
            'email.required' => 'el campo email es obligatorio',
            'email.unique' => 'Error ud esta como sospechoso ome',
            'password.required' => 'el campo password es obligatorio',
            'password.min' => 'el campo debe constar mminimo de 6 caracteres',

        ]);

        User::create([

            'first_name' => $dato['first_name'],
            'last_name' => $dato['last_name'],
            'email' => $dato['email'],
            'password' => bcrypt($dato['password'])

        ]);

        return redirect()->route('usuarios');
    }


        public function editUser(User $user)
        {
            /*renderiza la vista del formulario*/
            return view('usuarios.FormEditar', ['user' => $user]);
        }

        public function update(User $user)
        {
             
            $data = request()->all();
 
            $data['password'] = bcrypt($data['password']);
            //return redirect("usuarios/{$user->id}");
            $user->update($data);
            return redirect()->route('users.show', ['user' => $user["id"]]);
            
        }
}
