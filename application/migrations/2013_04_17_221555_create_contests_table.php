<?php

class Create_Contests_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contests', function($table) {
			$table->increments('id');
			$table->string('category');
			$table->string('title');
			$table->text('description');
			$table->float('budget');
			$table->string('owner');
			$table->timestamps();
			$table->timestamp('expires_at');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contests');
	}

}