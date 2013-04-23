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
			'image' => 'image|max:1500'
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

			$img = Input::file('image');

		    // Save a thumbnail
		    $success = Resizer::open( $img )
		        ->resize( 200 , 200 , 'crop' )
		        ->save( 'public/uploads/my-new-filename.jpg' , 90 );

			return Redirect::to_route('contest', $id);
		}	
	}
}