<?php

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

    	date_default_timezone_set('America/Bogota');
    	$created_at = date("Y-m-d H:i:s");

        DB::table('users')->insert([
        	'name' => 'Juan Felipe Rodríguez Vargas',
        	'email' => 'vargasjuan367@gmail.com',
        	'password' => bcrypt('romano'),
        	'created_at' => $created_at
        ]);
    }
}
