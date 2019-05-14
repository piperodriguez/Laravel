<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

    	$this->truncateTables([
            'pais',
    		'users',
			'profesiones'
    	]);

        $this->call(ProfesionSeeder::class);
	    $this->call(UsersSeeder::class);
        $this->call(PaisSeeder::class);

    }

    protected function truncateTables(array $tables)
    {
    	DB::statement('SET FOREIGN_KEY_CHECKS = 0');

    	foreach ($tables as $table) {
    		DB::table($table)->truncate();
    	}

    	DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
