<?php

class Contests_Controller extends Base_Controller {
	public $restful = true;

	public function get_index() 
	{
		$contests = Contest::all();		
		return View::make('contests.index')
			->with('contests', $contests);
	}

	public function get_show($id)
	{
		$contest = Contest::find((int)$id);
		$entries = Contest::find((int)$id)->entries;

		// Timestamp date conversion for startdate
		$original_date = $contest->created_at;
		$startdate = date("d-m-Y", strtotime($original_date));

		// Timestamp date conversion for enddate
		$original_date = $contest->expires_at;
		$enddate = date("d-m-Y", strtotime($original_date));

		return View::make('contests.show_contest')
			->with('title', $contest->title)
			->with('description', $contest->description)
			->with('contest_id', $contest->id)
			->with('contest_owner', $contest->owner)
			->with('entries', $entries)
			->with('startdate', $startdate)
			->with('enddate', $enddate);
	}

	public function get_new()
	{	
		if (!Auth::check())
		{
		     return View::make('contests.new_contest')->with('login_status', 'Je moet ingelogd zijn om een wedstrijd aan te maken');
		}
		return View::make('contests.new_contest');
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

		$validation = Validator::make($input, $rules);

		if ($validation->fails()) {
			return Redirect::to_route('new_contest')
				->with_errors($validation->errors);
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
		$new_contest = Contest::create(array(
			'category' => Input::get('category'), 
			'title' => Input::get('title'), 
			'description' => Input::get('description'),
			'budget' => Input::get('budget'),
			'owner' => Auth::user()->username,
			'expires_at' => $enddate
		));

		if ( $new_contest ) {
			return Redirect::to_route('contest', $new_contest->id);
		}
	}
}