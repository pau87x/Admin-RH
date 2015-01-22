<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddCandidateIdToEducationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('education', function(Blueprint $table)
		{

			$table->integer('candidate_id')->unsigned()->after('end');

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('education', function(Blueprint $table)
		{
			$table->dropColumn('candidate_id');	
		});
	}

}
