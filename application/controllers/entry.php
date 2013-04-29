<?php

class Entry_Controller extends Base_Controller {
	public $restful = true;

	public function get_new() 
	{	
		return View::make('entry.index');
	}

	public function post_create($id)
	{
		$rules = array(
			'image' => 'image|max:2000|required'
		);

		$inputs = array(
			'image' => Input::file('image')
		);

		$validation = Validator::make($inputs, $rules);

		if ( $validation->fails() ) 
		{
			return Redirect::to_route('new_entry', $id)
		    	->with_errors($validation->errors);
		} else {
			// Set filename
			$filename = Input::file('image.name');

			// Upload the file
			Input::upload('image', 'public/uploads', $filename);

			$entry = Entry::create(array(
				'filename' => $filename,
				'contest_id' => $id,
				'user_id' => Auth::user()->id
			));

			return Redirect::to_route('contest', $id);
		}	
	}

	public function post_update() {
		$entry = Entry::find(Input::get('entry_id'));
		$entry->rating = Input::get('rating');
		$entry->save();
		return 'succesfully updated';
	}
}