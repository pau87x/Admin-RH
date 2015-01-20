<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePositionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('positions', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('name');
            $table->text('description');
            $table->enum('job_type', ['full', 'partial', 'freelance','intern']);
			$table->string('salary');

			$table->string('city');
			$table->integer('state_id')->unsigned();
			
			$table->string('website_url');

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
		Schema::drop('positions');
	}

}
