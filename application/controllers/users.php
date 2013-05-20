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
			->with('user', $user)
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
			'email' => 'required|email|unique:users',
			'password' => 'same:password2'
		);

		$validation = Validator::make($input, $rules);

		if ($validation->fails()) {
			return Redirect::to_route('new_user')
				->with_errors($validation->errors)->with_input();
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

	public function get_edit($id) {
		$user = User::find((int)$id);

		$address = Address::where_user_id($id)->first();

		if(empty($address)) {
			$address = new Address();
		}

		return View::make('users.edit_user')
			->with('user', $user)
			->with('address', $address);
	}

	public function post_edit($id) {
		$address = Address::where_user_id($id)->first();

		if(empty($address)) {
			$address = new Address();
		}

		$user = User::find((int)$id);

		Input::get();

		$user->username = Input::get('username');
		$user->email = Input::get('email');
		
		$address->user_id = Auth::user()->id;
		$address->firstname = Input::get('firstname');
		$address->lastname = Input::get('lastname');
		$address->company = Input::get('company');
		$address->address = Input::get('address');
		$address->postalcode = Input::get('postalcode');
		$address->city = Input::get('city');
		$address->phonenumber = Input::get('phonenumber');
		$address->taxnumber = Input::get('taxnumber');

		$user->save();
		$address->save();

		return Redirect::to_route('edit_user', $id)->with('message', 'Uw gegevens succesvol bijgewerkt!');
	}

	public function get_messages($id) {
		$user = User::find((int)$id);
		
		return View::make('users.messages_user')
		->with('user', $user);
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
		    	->with_errors($validation->errors)->with_input();
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