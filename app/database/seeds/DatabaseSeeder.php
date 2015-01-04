<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

        $this->call('StatusTableSeeder');
        $this->call('CentersTableSeeder');
		$this->call('TitlesTableSeeder');
        $this->call('EmployeeTableSeeder');
        
		// $this->call('UserTableSeeder');
	}

}
