<?php

class Nick extends Eloquent {

	protected $table = 'nicks';
	protected $fillable = array('author_id', 'label');
	protected $hidden = array('updated_at');
	
	public function author() {
        return $this->belongsTo('Author');
    }
	
	public function crossword() {
        return $this->hasMany('Crossword');
    }
	
	public function history() {
        return $this->hasMany('History');
    }
	
	public function report() {
        return $this->hasMany('Report');
    }

}
