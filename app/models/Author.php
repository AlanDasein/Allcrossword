<?php

class Author extends Eloquent {

	protected $table = 'authors';
	protected $fillable = array('contact');
	protected $hidden = array('updated_at');
	
	public function nick() {
        return $this->hasMany('Nick');
    }

}
