<?php

class SearchController extends BaseController {
	
	//perform a new search
	public function general() {
		
		//get data sent
		$data = Input::all();
		
		//clean data
		$min = is_numeric($data["minimum"]) && $data["minimum"] >= Settings::MIN_LEVEL() ? $data["minimum"] : Settings::MIN_LEVEL();
		$max = is_numeric($data["maximum"]) && $data["maximum"] > Settings::MIN_LEVEL() && $data["maximum"] <= 100 ? $data["maximum"] : 100;
		if($min >= $max) $min = Settings::MIN_LEVEL();
		$results = is_numeric($data["results"]) ? $data["results"] : Settings::DEF_RES_PER_PAGE();
		$results = $results >= Settings::MIN_RES_PER_PAGE() ? ($results <= Settings::MAX_RES_PER_PAGE() ? $results : Settings::MAX_RES_PER_PAGE()) : Settings::MIN_RES_PER_PAGE();
		
		//change search criteria
		Session::get("search")->language = Helpers::xss_clean(substr($data["language"], 0, 20));
		Session::get("search")->author = Helpers::valid_input(Helpers::xss_clean(substr($data["author"], 0, 20)));
		Session::get("search")->minimum = $min;
		Session::get("search")->maximum = $max;
		Session::get("search")->results = $results;
		Session::get("search")->order = $data["order"] == "complexity" ? "complexity" : "published_at";
		Session::get("search")->page = is_numeric($data["page"]) && $data["page"] > 0 ? $data["page"] : 1;
		
		//override cookie with search criteria
		Cookie::queue("allCrossword_search", json_encode(Session::get("search")), 2592000);
		
		//get query
		$response = $this->query();
		
		return json_encode($response);
		
	}
	
	//construct the query
	public function query() {
		
		//get total
		$total = DB::table("crosswords")->join("nicks", "crosswords.nick_id", "=", "nicks.id");
		$total->select(DB::raw("count(*) as total"));
		$total->where("published_at", ">", "0000-00-00");
		if(Session::get("search")->language != "any") $total->where("language", "=", Session::get("search")->language);
		if(Session::get("search")->author != "any") $total->where('label', 'LIKE', '%'.Session::get("search")->author.'%');
		$total->whereBetween('complexity', array(Session::get("search")->minimum, Session::get("search")->maximum));
		$result = $total->get();
		
		//proceed is at least a record have been found
		if($result[0]->total > 0) {
			
			//build range according with pagination
			$pages = ceil($result[0]->total / Session::get("search")->results);
			Session::get("search")->page = Session::get("search")->page > $pages ? $pages : Session::get("search")->page;
			$start = (Session::get("search")->page - 1) * Session::get("search")->results;
			$stop = ($result[0]->total - $start) > Session::get("search")->results ? Session::get("search")->results : $result[0]->total - $start;
			
			//get records
			$consult = DB::table("crosswords")->join("nicks", "crosswords.nick_id", "=", "nicks.id");
			$consult->select('crosswords.id', 'language', 'complexity', 'scheme', 'published_at', 'label');
			$consult->where("published_at", ">", "0000-00-00");
			if(Session::get("search")->language != "any") $consult->where("language", "=", Session::get("search")->language);
			if(Session::get("search")->author != "any") $consult->where("label", "LIKE", "%".Session::get("search")->author."%");
			$consult->whereBetween("complexity", array(Session::get("search")->minimum, Session::get("search")->maximum));
			$consult->orderBy(Session::get("search")->order, "desc");
			$consult->orderBy("reported", "asc");
			$consult->orderBy("crosswords.id", "desc");
			$consult->skip($start)->take($stop);
			$records = $consult->get();
			
			foreach($records as $record) {
				foreach($record as $key => $value) {if($key == "published_at") $record->$key = Helpers::format_date($value);}
			}
			
		}
		else {
			$pages = 0;
			$records = 0;
		}
		
		//make response
		$response = ["total" => $result[0]->total, "pages" => $pages, "criteria" => Session::get("search"), "records" => $records];
		
		return $response;
		
	}

}
