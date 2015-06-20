<?php

class Settings {
    
	public static function MAX_DAY_TO_PUBLISH() {return 15;} //max days the crossword can be stored without publish it
	
	public static function MAX_INACTIVE_DAYS() {return 7;} //max days of inactivity to delete wip records
	
	public static function MIN_LEVEL() {return 30;} //max level of complexity to publish a crossword
	
	public static function MIN_RES_PER_PAGE() {return 10;} //min results to show per page on search
	
	public static function MAX_RES_PER_PAGE() {return 60;} //max results to show per page on search
	
	public static function DEF_RES_PER_PAGE() {return 20;} //default results to show per page on search
	
	public static function MIN_LEV_COM_SAVE() {return 15;} //minimum level of complexity required for saving a crossword
	
	public static function MIN_LEV_COM_PUB() {return 30;} //minimum level of complexity required for publishing a crossword
	
}