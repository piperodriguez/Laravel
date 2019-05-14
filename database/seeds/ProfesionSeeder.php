<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfesionSeeder extends Seeder
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


       DB::table('profesiones')->insert([
        	'titulo' => 'Back-End Developer',
        	'created_at' => $created_at
        ]);

		DB::table('profesiones')->insert([
        	'titulo' => 'Front-End Developer',
        	'created_at' => $created_at
        ]);

		DB::table('profesiones')->insert([
        	'titulo' => 'Lider Developer',
        	'created_at' => $created_at
        ]);

        DB::table('profesiones')->insert([
        	'titulo' => 'Back-end Full Stack Developer',
        	'created_at' => $created_at
        ]);

        DB::table('profesiones')->insert([
        	'titulo' => 'Diseñador Grafico',
        	'created_at' => $created_at
        ]);

    }
}
