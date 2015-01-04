<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use AdminRH\Entities\Title;

class TitlesTableSeeder extends Seeder {

		public function run()
		{

	        Title::create([
	            'id'   => 1,
	            'name' => 'Empleado'
	        ]);

	        Title::create([
	           'id'   => 2,
	           'name' => 'Supervisor'
	        ]);

	        Title::create([
	            'id'   => 3,
	            'name' => 'Gerente'
	        ]);
		}

}