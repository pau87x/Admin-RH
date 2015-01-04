<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use AdminRH\Entities\Center;


class CentersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Center::create([
				'name' => $faker->streetName,
			]);
		}
	}



}