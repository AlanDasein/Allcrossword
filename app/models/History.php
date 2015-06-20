<?php

class History extends Eloquent {

	protected $table = 'history';
	protected $fillable = array('nick_id', 'crossword_id', 'language', 'reported');
	protected $hidden = array('id', 'updated_at');
	
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
