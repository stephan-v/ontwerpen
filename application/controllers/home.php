<?php

class Home_Controller extends Base_Controller {

	public $restful = true;

	public function get_index()
	{
		// Limit contests on the frontpage to 5
		$contests = Contest::take(5)->get();

		return View::make('home.index')
			->with('contests', $contests);
	}

}