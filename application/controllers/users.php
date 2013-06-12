<?php

class Users_Controller extends Base_Controller {
	public $restful = true;

	public function get_index() {
		return 'all users';
	}

	public function get_show($id) {
		$user_entries = Entry::where('user_id', '=', (int)$id)->get();
		$user = User::find((int)$id);

		$contests = Contest::where('owner', '=', $user->username)->get();

		// user online/offline functionality
		$now = new DateTime();
		$last_activity = new DateTime($user->last_activity);

		$interval = $last_activity->diff($now);	

		// na een 5 minuten interval zal de user op offline staan.
		if($interval->i > 5) {
			$status = 'background-position: 0 -16px';
		}else {
			$status = '';
		}

		return View::make('users.show_user')
			->with('user', $user)
			->with('entries', $user_entries)
			->with('contests', $contests)
			->with('status', $status);
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
			'password' => Hash::make(Input::get('password')),
			'hash' => hash('sha512', uniqid()) 
		));

		Message::send(function($message) use ($new_user)
		{
		    $message->to($new_user->email);
		    $message->from('info@microlancer.nl', 'Microlancer.nl');

		    $message->subject('Microlancer.nl nieuw account');
		    $message->body('

		    	Bedankt voor het registreren!

				Uw account is aangemaakt, u kan inloggen met de volgende gegevens nadat u u account heeft geactiveerd met de url hier beneden.

				------------------------
				Gebruikersnaam: '.$new_user->username.'
				Wachtwoord: '.Input::get('password').'
				------------------------

				Klik op deze link om uw account te activeren.
 
				http://ontwerpwedstrijden.dev/users/verify?email='.$new_user->email.'&hash='.$new_user->hash.' 

				Met vriendelijke groet,

				Microlancer.nl

			');
		});

		if ( $new_user ) {
			return View::make('single-pages.message')
				->with('message', 'Bedankt uw account is aangemaakt. We hebben uw een email gestuurd met uw accountgegevens en een link om uw account activeren.');
		}
	}

	public function get_edit($id) {
		$user = User::find((int)$id);

		$address = Address::where_user_id($id)->first();

		if(empty($address)) {
			$address = new Address();
		}

		// user online/offline functionality
		$now = new DateTime();
		$last_activity = new DateTime($user->last_activity);

		$interval = $last_activity->diff($now);	

		// na een 5 minuten interval zal de user op offline staan.
		if($interval->i > 5) {
			$status = 'background-position: 0 -16px';
		}else {
			$status = '';
		}

		return View::make('users.edit_user')
			->with('user', $user)
			->with('address', $address)
			->with('status', $status);
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

		return Redirect::to_route('edit_user', $id)
			->with('message', 'Uw gegevens succesvol bijgewerkt!');
	}

	public function get_messages($id) {
		$user = User::find((int)$id);

		// user online/offline functionality
		$now = new DateTime();
		$last_activity = new DateTime($user->last_activity);

		$interval = $last_activity->diff($now);	

		// na een 5 minuten interval zal de user op offline staan.
		if($interval->i > 5) {
			$status = 'background-position: 0 -16px';
		}else {
			$status = '';
		}
		
		return View::make('users.messages_user')
		->with('user', $user)
		->with('status', $status);
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
			'password' => 'required',
		);	

		$messages = array(
			'email_required' => 'Uw email is verplicht.',
			'email_email' => 'Dit is geen geldig email adres.',
		    'password_required' => 'Uw wachtwoord is verplicht.',
		);

		$validation = Validator::make($input, $rules, $messages);

		if ($validation->fails())
		{
		    return Redirect::to_route('login_user')
		    	->with_errors($validation->errors)->with_input();
		}

		$credentials = array(
			'username' => $input['email'],
			'password' => $input['password'],
		);

		if (Auth::attempt($credentials)) 
		{
			// Set remember me cookie if the user checks the box
			$remember = Input::get('remember');
			if ( !empty($remember) )
			{
				Auth::login(Auth::user()->id, true);
			}

			// Check if account is active or not
			if(Auth::user()->active) {
		        return Redirect::to_route('user', Auth::user()->id);
		    } else {
		    	Auth::logout();
		    	return Redirect::to_route('login_user')
	    			->with('login_errors', 'U heeft uw account nog niet geactiveerd.')
	    			->with_input();
		    }

		} else {
			return Redirect::to_route('login_user')
	    		->with('login_errors', 'Gebruikersnaam of wachtwoord incorrect.')
	    		->with_input();
		}
	}

	public function get_logout() 
	{
		Auth::logout();
		return Redirect::home();
	}

	public function get_verify() {
		$user = User::where('email', '=', Input::get('email'))->first();
		if($user->hash === Input::get('hash')) {
			$user->active = true;
			$user->save();

			return View::make('single-pages.message')
				->with('message', 'Bedankt uw account is geactiveerd!');
		}
	}
}