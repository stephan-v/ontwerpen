<?php

class Comments_controller extends Base_Controller {

	public $restful = true;

	public function post_create($id) {

		$new_comment = Comment::create(array(
			'comment' => Input::get('comment'),
			'contest_id' => $id,
			'user_id' => Auth::user()->id
		));

		if ( $new_comment ) {
			return Redirect::to_route('contest', $new_comment->contest_id)
			->with('tab_index', 2);
		}
	}

	public function delete_destroy() {
		$comment_id = Input::get('comment_id');
		Comment::find($comment_id)->delete();
	}
}