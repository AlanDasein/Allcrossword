<?php

class Crossword extends Eloquent {

	protected $table = 'crosswords';
	protected $fillable = array('token', 'nick_id', 'language', 'complexity', 'notes', 'scheme', 'layout', 'reported', 'published_at');
	
	public function nick() {
        return $this->belongsTo('Nick');
    }
	
	public function wip() {
        return $this->hasMany('Wip');
    }
	
	public function report() {
        return $this->hasMany('Report');
    }

}
