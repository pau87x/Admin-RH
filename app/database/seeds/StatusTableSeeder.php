<?php

use AdminRH\Entities\Status;

class StatusTableSeeder extends Seeder {

	public function run()
	{

        Status::create([
            'name' => 'Inactive'
        ]);

        Status::create([
           'name' => 'Active'
        ]);

        Status::create([
            'name' => 'Permission'
        ]);
	}

}