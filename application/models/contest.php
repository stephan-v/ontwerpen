<?php

class Contest extends Eloquent {

	public static $timestamps = true;

	public function entries()
	{
		return $this->has_many('Entry');
	}

	public function comments()
    {
        return $this->has_many('Comment');
    }
}