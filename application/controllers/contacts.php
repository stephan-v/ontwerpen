<?php

class Contacts_Controller extends Base_Controller {
	public $restful = true;

	public function get_new() {
		return View::make('contacts.new_contact');
	}
}