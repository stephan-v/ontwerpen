<?php

class Create_Entries_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('entries', function($table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('contest_id');
			$table->string('filename');
			$table->integer('rating');
			$table->boolean('winning_design');
			$table->timestamps();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('entries');
	}

}