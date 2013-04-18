<?php

class User extends Eloquent {
	public function entries() {
		return $this->has_many('Entry');
	}
}