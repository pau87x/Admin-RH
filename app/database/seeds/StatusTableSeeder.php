<?php

use AdminRH\Entities\Status;

class StatusTableSeeder extends Seeder {

	public function run()
	{

        Status::create([
            'id'   => 0,
            'name' => 'Inactive'
        ]);

        Status::create([
           'id'   => 1,
           'name' => 'Active'
        ]);

        Status::create([
            'id'   => 2,
            'name' => 'Permission'
        ]);
	}

}