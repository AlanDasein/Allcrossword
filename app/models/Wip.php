<?php

class Wip extends Eloquent {

	protected $table = 'wip';
	protected $fillable = array('crossword_id', 'token', 'contact', 'work');
	protected $hidden = array('id', 'token');
	
	public function crossword() {
        return $this->belongsTo('Crossword');
    }
	
	public function history() {
        return $this->belongsTo('History');
    }

}
