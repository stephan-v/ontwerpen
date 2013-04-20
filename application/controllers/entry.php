<?php

class Entry_Controller extends Base_Controller {
	public $restful = true;

	public function get_new() 
	{	
		return View::make('entry.index');
	}

	public function post_create($id)
	{
		$entry = Entry::create(array(
			'title' => Input::get('title'),
			'contest_id' => $id,
			'user_id' => Auth::user()->id
		));

		return Redirect::to_route('contest', $id);
	}
}