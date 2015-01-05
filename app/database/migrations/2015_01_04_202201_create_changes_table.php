<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChangesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('changes', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('employee_id')->unsigned();
			$table->date('date');
			$table->integer('title_id')->unsigned();
			$table->integer('center_id')->unsigned();
			$table->integer('supervisor_id')->unsigned();
 			$table->decimal('salary');

			$table->foreign('employee_id')->references('id')->on('employees');
			$table->foreign('title_id')->references('id')->on('titles');
			$table->foreign('center_id')->references('id')->on('centers');
			$table->foreign('supervisor_id')->references('id')->on('employees');		
			
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
		Schema::drop('changes');
	}

}
