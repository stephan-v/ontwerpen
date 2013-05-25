<?php

class Contests_Controller extends Base_Controller {
	public $restful = true;

	public function get_index() 
	{
		$contests = Contest::all();	

		return View::make('contests.index')
			->with('contests', $contests);
	}

	//----- Alle Categorie Filters
	public function get_filter($category) {
		$contests = Contest::where_category($category)->get();	

		return View::make('contests.index')
			->with('contests', $contests);
	}

	public function get_show($id)
	{
		$contest = Contest::find((int)$id);

		// Pak de entries uit de table en sorteer ze op aflopende rating
		$entries = Contest::find((int)$id)->entries()->order_by('rating', 'desc')->get();

		// Contest winner
		$winner = Entry::where('winning_design', '=', 1)->where('contest_id', '=', $id)->first();

		// Pak de comments die bij de wedstrijd horen waarbij de laatste comments bovenaan komen.
		$comments = Contest::find((int)$id)->comments()->order_by('created_at', 'desc')->get();

		// Timestamp date conversion for startdate
		$original_date = $contest->created_at;
		$startdate = date("d-m-Y H:i:s", strtotime($original_date));

		// Timestamp date conversion for enddate
		$original_date = $contest->expires_at;
		$enddate = date("d-m-Y H:i:s", strtotime($original_date));

		// moet opgeschoond worden $contest->title etc verwijderen!
		return View::make('contests.show_contest')
			->with('contest', $contest)
			->with('entries', $entries)
			->with('startdate', $startdate)
			->with('enddate', $enddate)
			->with('comments', $comments)
			->with('winner', $winner);
	}

	public function get_new()
	{	
		if (!Auth::check())
		{
		     return View::make('contests.new_contest')->with('login_status', 'Je moet ingelogd zijn om een wedstrijd aan te maken');
		}
		return View::make('contests.new_contest');
	}

	public function get_new2()
	{	
		return View::make('contests.step2');
	}

	public function get_edit()
	{
		return 'Wedstrijd bewerken';
	}

	public function post_create() 
	{
		// Validate
		$input = Input::all();

		$rules = array(
			'category' => 'required',
			'title' => 'required',
			'description' => 'required',
			'budget' => 'required|numeric',
			'enddate' => 'required'
		);

		$messages = array(
			'title_required' => 'Geef een titel op voor uw wedstrijd.',
			'description_required' => 'Geef een omschrijving op voor uw wedstrijd.',
		    'budget_required' => 'Geef een budget op voor uw wedstrijd.',
		    'budget_numeric' => 'Het budget moet een getal zijn.',
		);

		$validation = Validator::make($input, $rules, $messages);

		if ($validation->fails()) {
			return Redirect::to_route('new_contest')
				->with_errors($validation->errors)->with_input();
		}

		// Get enddate input
		$enddate = Input::get('enddate');

		// Check selected enddate and input expirationdate based on enddate weeks
		switch($enddate) 
		{
		case "1week":
			$enddate = date('Y-m-d H:i:s', strtotime('+1 weeks'));
			break;
		case "2week":
			$enddate = date('Y-m-d H:i:s', strtotime('+2 weeks'));
			break;
		case "3week":
			$enddate = date('Y-m-d H:i:s', strtotime('+3 weeks'));
			break;
		case "4week":
			$enddate = date('Y-m-d H:i:s', strtotime('+4 weeks'));
			break;
		case "5week":
			$enddate = date('Y-m-d H:i:s', strtotime('+5 weeks'));
			break;
		case "6week":
			$enddate = date('Y-m-d H:i:s', strtotime('+6 weeks'));
			break;
		}

		// Get inputdata for the creation of the contest and insert into table contest
		$step1 = array(
			'category' => Input::get('category'), 
			'title' => Input::get('title'), 
			'description' => Input::get('description'),
			'budget' => Input::get('budget'),
			'owner' => Auth::user()->username,
			'expires_at' => $enddate
		);

		if ( $step1 ) {
			Session::put('step1_inputdata', $step1);
			return Redirect::to_route('new_contest2');
		}
	}

	public function post_create2() 
	{
		// Validate
		$input = Input::all();

		$rules = array(
			'firstname' => 'required',
			'lastname' => 'required',
			'company' => 'required',
			'address' => 'required',
			'postalcode' => 'required',
			'city' => 'required',
			'phonenumber' => 'required',
			'taxnumber' => 'required',
		);

		$messages = array(
			'firstname_required' => 'Uw voornaam is verplicht.',
			'lastname_required' => 'Uw achternaam is verplicht.',
			'company_required' => 'Uw bedrijfsnaam is verplicht.',
			'address_required' => 'Uw adres is verplicht.',
			'postalcode_required' => 'Uw postcode is verplicht.',
			'city_required' => 'Uw stad is verplicht.',
			'phonenumber_required' => 'Uw telefoonnummber is verplicht.',
			'taxnumber_required' => 'Uw btw nummer is verplicht.',
		);

		$validation = Validator::make($input, $rules, $messages);

		if ($validation->fails()) {
			return Redirect::to_route('new_contest2')
				->with_errors($validation->errors)->with_input();
		}

		// Get inputdata for the creation of the contest and insert into table contest
		$step2 = array(
			'user_id' => Auth::user()->id,
			'firstname' => Input::get('firstname'), 
			'lastname' => Input::get('lastname'), 
			'company' => Input::get('company'),
			'address' => Input::get('address'),
			'postalcode' => Input::get('postalcode'),
			'city' => Input::get('city'),
			'phonenumber' => Input::get('phonenumber'),
			'taxnumber' => Input::get('taxnumber'),
		);

		if ( $step2 ) {
			$step1 = Session::get('step1_inputdata');
			$step1 = Contest::create($step1);

			// Moet uiteindelijk ook session worden in stap3
			Address::create($step2);

			return Redirect::to_route('contest', $step1->id);
		}
	}
}