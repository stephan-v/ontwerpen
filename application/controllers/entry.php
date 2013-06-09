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
			Input::upload('image', path('public') . 'uploads', $filename);

			$entry = Entry::create(array(
				'filename' => $filename,
				'contest_id' => $id,
				'user_id' => Auth::user()->id
			));

			return Redirect::to_route('crop_entry', $id)
				->with('filename', $filename);
		}	
	}

	public function post_update() {
		$entry = Entry::find(Input::get('entry_id'));
		$entry->rating = Input::get('rating');
		$entry->save();
		return 'succesfully updated';
	}

	public function delete_destroy() {
		$entry = Entry::find(Input::get('entry_id'));
		Entry::find($entry->id)->delete();
		File::delete(path('public').'uploads/' . $entry->filename);
		File::delete(path('public').'thumbnails/' . $entry->filename);
	}

	public function get_crop() {
		return View::make('entry.crop');
	}

	public function post_crop($id) {
		$targ_w = 200; 
		$targ_h = 150;
		$jpeg_quality = 80;

		$x = Input::get('x');
		$y = Input::get('y');
		$w = Input::get('w');
		$h = Input::get('h');
		$filename = Input::get('filename');

		$src = path('public') .'uploads/' . $filename;
		$img_r = imagecreatefromjpeg($src);
		$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

		imagecopyresampled($dst_r,$img_r,0,0,$x,$y,
		$targ_w,$targ_h,$w,$h);

		// Comment out the header() call, only used for testing.
		// header('Content-type: image/jpeg');
		imagejpeg($dst_r, path('public') . 'thumbnails/' . $filename ,$jpeg_quality);

		return Redirect::to_route('contest', $id)
			->with('tab_index', 1);
	}
}