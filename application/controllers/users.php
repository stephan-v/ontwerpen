<?php

class Users_Controller extends Base_Controller {
	public $restful = true;

	public function get_index() {
		return 'all users';
	}

	public function get_show($id) {
		$user = User::find((int)$id);
		return $user->name;
	}

	public function get_new() {
		return View::make('users.new_user');
	}
}