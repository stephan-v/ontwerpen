<?php

class Home_Controller extends Base_Controller {

	public $restful = true;

	public function get_index()
	{
		$contests = Contest::all();

		return View::make('home.index')
			->with('contests', $contests);
	}

}