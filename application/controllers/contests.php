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

		// Get the username from users

		return View::make('contests.show_contest')
			->with('title', $contest->title)
			->with('description', $contest->description)
			->with('contest_id', $contest->id)
			->with('entries', $entries);
	}

	public function get_new()
	{
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
		);

		$validation = Validator::make($input, $rules);

		if ($validation->fails()) {
			return Redirect::to_route('new_contest')
				->with_errors($validation->errors);
		}

		// Get inputdata and insert into table users
		$new_contest = Contest::create(array(
			'category' => Input::get('category'), 
			'title' => Input::get('title'), 
			'description' => Input::get('description'),
			'budget' => Input::get('budget') 
		));

		if ( $new_contest) {
			return Redirect::to_route('contest', $new_contest->id);
		}
	}
}