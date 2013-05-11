<?php

class Users_Controller extends Base_Controller {
	public $restful = true;

	public function get_index() {
		return 'all users';
	}

	public function get_show($id) {
		$user_entries = User::find((int)$id)->entries;
		$user = User::find((int)$id);

		$contests = Contest::where('owner', '=', $user->username)->get();

		return View::make('users.show_user')
			->with('username', $user->username)
			->with('email', $user->email)
			->with('entries', $user_entries)
			->with('contests', $contests);
	}

	public function get_new() {
		return View::make('users.new_user');
	}

	public function post_create()
	{
		// Validate
		$input = Input::all();

		$rules = array(
			'username' => 'required|unique:users',
			'email' => 'required|email|unique:users'
		);

		$validation = Validator::make($input, $rules);

		if ($validation->fails()) {
			return Redirect::to_route('new_user')
				->with_errors($validation->errors);
		}

		// Get inputdata and insert into table users
		$new_user = User::create(array(
			'username' => Input::get('username'), 
			'email' => Input::get('email'), 
			'password' => Hash::make(Input::get('password')) 
		));

		if ( $new_user ) {
			return Redirect::to_route('user', $new_user->id);
		}
	}

	public function get_login()
	{
		return View::make('users.login_user');
	}

	public function post_login() 
	{
		$input = Input::all();

		$rules = array(
			'email' => 'required|email',
			'password' => 'required'
		);	

		$validation = Validator::make($input, $rules);

		if ($validation->fails())
		{
		    return Redirect::to_route('login_user')
		    	->with_errors($validation->errors);
		} else {
			$credentials = array(
				'username' => Input::get('email'),
				'password' => Input::get('password'),
				'remember' => Input::get('remember')
			);

			if (Auth::attempt($credentials)) 
			{
				if ( !empty($remember))
				{
					Auth::login(Auth::user()->id, true);
				}
				if ( Auth::check() ) return Redirect::home();
			} else {
				return Redirect::to_route('login_user')
		    	->with('login_errors', true);
			}
		}	

	}

	public function get_logout() 
	{
		Auth::logout();
		return Redirect::home();
	}
}