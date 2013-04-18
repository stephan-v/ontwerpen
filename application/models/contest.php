<?php

class Contest extends Eloquent {
	public function entries()
	{
		// Maak gebruik van entries model door ('Entry')
		return $this->has_many('Entry');
	}
}