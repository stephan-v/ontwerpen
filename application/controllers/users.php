<?php

class Users_Controller extends Base_Controller {
	public $restful = true;

	public function get_index() {
		return 'all users';
	}

	public function get_show($id) {
		$user_entries = User::find((int)$id)->entries;
		$user = User::find((int)$id);
		return View::make('users.show_user')
			->with('name', $user->name)
			->with('email', $user->email)
			->with('entries', $user_entries);
	}

	public function get_new() {
		return View::make('users.new_user');
	}

	public function post_create()
	{
		// Validate
		$input = Input::all();

		$rules = array(
			'name' => 'required',
			'email' => 'required|email|unique:users'
		);

		$validation = Validator::make($input, $rules);

		if ($validation->fails()) {
			return Redirect::to_route('new_user')
				->with_errors($validation->errors);
		}

		// Get inputdata and insert into table users
		$new_user = User::create(array(
			'name' => Input::get('name'), 
			'email' => Input::get('email'), 
			'password' => Input::get('password') 
		));

		if ( $new_user ) {
			return Redirect::to_route('user', $new_user->id);
		}
	}
}