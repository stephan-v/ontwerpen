<?php

class Contests_Controller extends Base_Controller {
	public $restful = true;

	public function get_index() 
	{
		return View::make('contests.index');
	}

	public function get_show()
	{
		return 'Een wedstrijd';
	}

	public function get_new()
	{
		return View::make('contests.new_contest');
	}

	public function get_edit()
	{
		return 'Wedstrijd bewerken';
	}
}