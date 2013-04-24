<?php

class Contacts_Controller extends Base_Controller {
	public $restful = true;

	public function get_index() 
	{
		return View::make('contacts.index');
	}

	public function get_new() 
	{
		return View::make('contacts.new_contact');
	}

	public function post_new() 
	{
		Message::send(function($message)
		{
		    $message->to('stephan-v@hotmail.com');
		    $message->from(Input::get('email'), Input::get('name'));

		    $message->subject('Microlancer.nl contactform');
		    $message->body(Input::get('body'));
		});

		return 'mail send';
	}
}