<?php

class Contest extends Eloquent {

	public static $timestamps = true;

	public function entries()
	{
		// Maak gebruik van entries model door ('Entry')
		return $this->has_many('Entry');
	}
}