<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use AdminRH\Entities\User;
use AdminRH\Entities\Employee;

class EmployeeTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 80) as $index)
		{
            $firstName  = $faker->firstName;
            $middleName = $faker->firstName;
            $thirdName  = $faker->firstName;
            $lastName   = $faker->lastName;
            $maidenName   = $faker->lastName;

            $email = $faker->email;
            
            $fullName = $firstName . ' ' . $middleName . ' ' . $thirdName  . ' ' . $lastName . ' ' . $maidenName;

            $user = User::create([
               'full_name' => $fullName,
               'email'     => $email,
               'password'  => '123456',
               'type'      => 'employee'
            ]);

			Employee::create([
                'id'          => $user->id,
                'code'        => $user->id,
                
                'first_name'  => $firstName,
                'middle_name' => $middleName,
                'third_name'  => $thirdName,
                'last_name'   => $lastName,
                'maiden_name' => $maidenName,

                'genre'       => $faker->randomElement(['female', 'male']),
                'birthdate'   => $faker->date($format = 'Y-m-d', $max = 'now'),

                //$tabla->string('photo', 100);

                'phone'       => $faker->numberBetween($min = 2727230000, $max = 2727299999),
                'cell_phone'  => $faker->numberBetween($min = 2721110000, $max = 2721199999),
                'email'       => $email,

                'rfc'         => $faker->numberBetween($min = 1000000000, $max = 9999999999),
                'curp'        => $faker->numberBetween($min = 1000000000, $max = 9999999999),
                'ss_number'   => $faker->numberBetween($min = 1000000000, $max = 9999999999),

                'street' => $faker->streetName,
                'no_ext' => $faker->buildingNumber,
                'no_int' => $faker->randomLetter,
                'extra_address' => $faker->secondaryAddress,
                'zip_code' => $faker->postcode,

                'city_id' => $faker->numberBetween($min = 1, $max = 369987),
                'state_id' => $faker->numberBetween($min = 1, $max = 32), 

                'status_id'   => $faker->randomElement([0, 1, 2]),     

			]);
		}
	}

}