<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('employees', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('code')->unique();
			$table->string('first_name');
			$table->string('middle_name');
			$table->string('last_name');
			$table->string('maiden_name');
			
			$table->enum('genre', ['female', 'male']);
			$table->date('birthdate');
		
			//$tabla->string('photo', 100);

			$table->string('phone');
			$table->string('cell_phone');
			$table->string('email');

			$table->string('rfc');
			$table->string('curp');
			$table->string('ss_number');

			//address

			$table->string('street');
			$table->string('no_ext');
			$table->string('no_int');
			$table->string('extra_address');			//colonia
			$table->string('zip_code');

			$table->string('city');
			$table->integer('state_id')->unsigned();

			$table->integer('status_id')->default(2);

			$table->foreign('state_id')->references('id')->on('estados');			

			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('employees');
	}

}
