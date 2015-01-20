<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCandidatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('candidates', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('first_name');
			$table->string('middle_name');
			$table->string('last_name');
			$table->string('maiden_name');
			
			$table->enum('genre', ['female', 'male']);
			$table->date('birthdate');
			
			$table->string('cell_phone');
			$table->string('email');

			$table->string('city');
			$table->integer('state_id')->unsigned();
			
			$table->integer('position_id')->unsigned();
			
			$table->string('cv');
			$table->decimal('salary');

			$table->text('comment');

			$table->foreign('state_id')->references('id')->on('estados');	
			$table->foreign('position_id')->references('id')->on('positions');	
	
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
		Schema::drop('candidates');
	}

}
