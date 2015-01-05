<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLayoffsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('layoffs', function(Blueprint $table)
		{
			$table->increments('id');

			$table->date('date');
			$table->integer('employee_id')->unsigned();
			$table->string('reason');
			$table->text('comments');

			$table->foreign('employee_id')->references('id')->on('employees');
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
		Schema::drop('layoffs');
	}

}
