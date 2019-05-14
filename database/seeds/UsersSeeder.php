<?php
use App\Models\User;
use App\Models\Profesiones;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


      /*Forma de trabajar con los modelos*/
       $propfesion = Profesiones::select('id_profesion')->where(['titulo' => 'Back-End Developer'])->value('id_profesion');

      User::create([
          'name' => 'Juan Felipe Rodríguez Vargas',
          'email' => 'vargasjuan367@gmail.com',
          'password' => bcrypt('romano'),
          'id_profesion' => $propfesion
      ]);



      //$Profesion = DB::select('SELECT id_profesion FROM profesiones WHERE titulo = "Back-End Developer"');
      //dd($Profesion);



       /*/dd($propfesion->first()->id_profesion);//$profesion[0]*/

       /*
        date_default_timezone_set('America/Bogota');
        $created_at = date("Y-m-d H:i:s");

       DB::table('users')->insert([
        	'name' => 'Juan Felipe Rodríguez Vargas',
        	'email' => 'vargasjuan367@gmail.com',
        	'password' => bcrypt('romano'),
        	'created_at' => $created_at,
            'id_profesion' => $propfesion
        ]);*/
    }
}
