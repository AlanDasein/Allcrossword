<?php

class Report extends Eloquent {

	protected $table = 'reports';
	protected $fillable = array('nick_id', 'crossword_id', 'complaint', 'status');
	protected $hidden = array('id', 'updated_at');
	
	public function nick() {
        return $this->belongsTo('Nick');
    }
	
	public function crossword() {
        return $this->belongsTo('Crossword');
    }
	
	public function history() {
        return $this->belongsTo('History');
    }

}
