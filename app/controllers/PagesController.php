<?php

class PagesController extends BaseController {

	public function home() {
		
		//set the session if it's not already set
		if (!Session::has("search")) {
			
			//check for a cookie
			$search = Cookie::get('allCrossword_search');
			
			//create the session
			if($search) Session::put("search", json_decode($search));
			else {
				$search = new stdClass();
				$search->language = "any";
				$search->author = "";
				$search->minimum = "";
				$search->maximum = "";
				$search->results = Settings::DEF_RES_PER_PAGE();
				$search->order = "complexity";
				$search->page = 1;
				Session::put("search", $search);
			}
			
		}
		
		//open the main page
		return View::make("home");
		
	}
	
	public function display($id, $token) {
		
		//get the work in progress if in wip mode or make it false otherwise
		$progress = $token ? Wip::where("id", $id)->where("token", $token)->first() : false;
		
		//get the crossword according of in normal view or in wip mode
		$crossword = Crossword::with("nick")->where("id", $progress ? $progress->crossword_id : $id)->where("published_at", "<>", "0000-00-00")->first();
		
		//open the view regardless the results of the operation to handle there what content to display according with the results
		return View::make("crossword", ["crossword" => $crossword, "progress" => $progress, "token" => $token]);
		
	}
	
	public function build($id, $token) {
		
		//get the crossword if in edit mode or make it false otherwise
		$crossword = $token ? Crossword::with("nick")->where("id", $id)->where("token", $token)->first() : false;
		
		//get the delete history record if no record was found and the parameters are set in edit mode
		$removed = (!$crossword && $token && $id > 0) ? History::select("reported")->where("crossword_id", $id)->first() : false;
		
		//if data are incorrect redirect to home, otherwise open the builder view sending the parameters
		return (!$crossword && !$removed && $id > 0) ? View::make("home") : View::make("build", ["crossword" => $crossword, "removed" => $removed]);
		
	}
	
	public function info($page) {return View::make($page);}
	
	public function embeed($id) {
		
		//get the crossword to embeed
		$crossword = Crossword::with("nick")->where("id", $id)->where("published_at", "<>", "0000-00-00")->first();
		
		//open the view
		return View::make("embeed", ["crossword" => $crossword]);
		
	}
	
	public function contact() {
		
		//get data sent
		$data = Input::all();
		
		//clean data
		$data["name"] = Helpers::xss_clean(substr($data["name"], 0, 50));
		if(strlen($data["name"]) < 3) return json_encode(0);
		$data["email"] = Helpers::valid_mail(substr($data["email"], 0, 100)) ? $data["email"] : "";
		if($data["email"] == "") return json_encode(1);
		$data["subject"] = Helpers::xss_clean(substr($data["subject"], 0, 200));
		if(strlen($data["subject"]) < 15) return json_encode(2);
		$data["message"] = Helpers::xss_clean(substr($data["message"], 0, 4000));
		if(strlen($data["message"]) < 150) return json_encode(3);
		
		//check capcha
		$result = $data["g-recaptcha-response"] == "" ? false : Captcha::verify($data["g-recaptcha-response"]);
		if(!$result) return json_encode(4);
		
		Mail::queue("emails.contact", ["name" => $data["name"], "mail" => $data["email"], "body" => $data["message"]], function($message) {
			$message->to("admin.masteraccount@allcrossword.com", Helpers::xss_clean(Input::get("name")))->subject(Helpers::xss_clean(Input::get("subject")));
		});
		
		return json_encode(5);
		
	}
	
}
