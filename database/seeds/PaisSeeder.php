<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaisSeeder extends Seeder
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

    	DB::table('pais')->insert([
    		'nombre_pais' => 'Colombia',
    		'clima' => 'Calido, Frio, Templado',
    		'created_at' => $created_at
    	]);

    }
}
