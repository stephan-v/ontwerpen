<?php

class User extends Eloquent {
	// has not been used yet
	public function entry() {
		return $this->has_many('Entry');
	}

	// use as: $user_address = User::find(1)->address()->first();
	public function address() {
		return $this->has_one('Address');
	}
}