<?php

use AdminRH\Entities\User;

class UsersTableSeeder extends Seeder {

	public function run()
	{

        User::create([
            'full_name' => 'Admin',
            'email'     => 'admin@admin.com',
            'password'  => 'admin',
            'type'      => 'admin'
        ]);
	}

}