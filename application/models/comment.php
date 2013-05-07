<?php

class Comment extends Eloquent {

	// use as: $comment_user = Comment::find(1)->user()->first();
	public function user() {
		return $this->has_one('user');
	}

}