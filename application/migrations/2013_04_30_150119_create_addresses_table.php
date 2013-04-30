<?php

class Create_Addresses_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('addresses', function($table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->string('firstname');
			$table->string('lastname');
			$table->string('company');
			$table->string('address');
			$table->string('postalcode');
			$table->string('city');
			$table->string('country');
			$table->string('phonenumber');
			$table->string('taxnumber');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('addresses');
	}

}