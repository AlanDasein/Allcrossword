<?php

class SettingsController extends BaseController {
	
	//check if contact mail for a new crossword is registered in the database
	public function author() {
		
		//get data sent
		$data = Input::get("author");
		
		//check invalid email
		if(!is_numeric($data) && !Helpers::valid_mail($data)) return "";
		
		//get info
		$author = is_numeric($data) ? Author::with("nick")->where("id", $data)->first() : Author::with("nick")->whereRaw("BINARY contact = ?", array($data))->first();
		
		//send info
		return $author ? $author->toJson() : (is_numeric($data) ? 'error' : '{"author": "'.$data.'"}');
		
	}
	
	//check if nick send is in used by another author
	public function nick() {
		
		//get data sent
		$data = Helpers::valid_input(Helpers::xss_clean(Input::get("nick")));
		
		//check the nick
		if(strlen($data) > 0) $nick = Nick::whereRaw("BINARY label = ?", array($data))->first();
		
		//send result
		return strlen($data) > 0 ? (count($nick) == 0 ? json_encode("false") : json_encode("The entered author is already in use")) : json_encode("The entered author is not valid");
		
	}
	
	// validate captcha
	public function validate() {
		
		//get captcha response
		$data = Input::get("g-recaptcha-response");
		
		//check capcha
		$result = $data == "" ? false : Captcha::verify($data);
		
		//send response
		return json_encode($result);
		
	}
	
	// insert or update crossword
	public function save() {
		
		//get data sent
		$data = Input::all();
		
		//define mode
		$edit = is_numeric($data["id"]);
		
		//clean data
		$data["label"] = Helpers::valid_input(Helpers::xss_clean($data["label"]));
		$data["language"] = Helpers::xss_clean($data["language"]);
		$data["notes"] = Helpers::xss_clean($data["notes"]);
		$data["layout"] = Helpers::xss_clean($data["layout"]);
		
		//insert new author if applicable
		$author = is_numeric($data["author"]) ? $data["author"] : DB::table("authors")->insertGetId(array('contact' => $data["author"]));
		
		//insert new nick if applicable
		$nick = Nick::firstOrCreate(["label" => $data["label"], "author_id" => $author]);
		
		//set crossword
		$crossword = $edit ? Crossword::find($data["id"]) : new Crossword;
		if($edit && count($crossword) != 1) return json_encode("DELETED"); //the crossword that is being edited has been deleted
		$crossword->nick_id = $nick->id;
		if(!$edit) $crossword->token = Helpers::encryptor(Hash::make(time().mt_rand()));
		$crossword->language = $data["language"];
		$crossword->complexity = $data["complexity"];
		$crossword->notes = $data["notes"];
		$crossword->scheme = $data["scheme"];
		$crossword->layout = $data["layout"];
		if($data["published"] == "1") $crossword->published_at = date("Y-m-d"); else if(!$edit) $crossword->published_at = "0000-00-00";
		$crossword->save();
		
		//send mail with link to the crossword when crossword is new
		if(!$edit) Mail::queue("emails.email", ["mode" => "edit", "id" => $crossword->id, "token" => $crossword->token], function($message) use ($data) {
			$message->to(is_numeric($data["author"]) ? $data["user"] : $data["author"], Helpers::valid_input(Helpers::xss_clean(Input::get("label"))))->subject("You have created a new crossword");
		});
		
		//send feedback
		if($edit) return $data["published"] == "1" ? json_encode(Helpers::format_date($crossword->published_at)) : json_encode("false");
		Session::put('feedback', $crossword->published_at == "0000-00-00" ? "2" : "1");
		return json_encode("javascript:window.location = HOST + '/crossword/edit/".$crossword->id."/".$crossword->token."'");
		
	}
	
	// delete crossword
	public function delete() {
		
		//get data sent
		$data = Input::all("id");
		
		//get crossword
		$crossword = Crossword::find($data["id"]);
		
		if($crossword->published_at != '0000-00-00') {
			//keep record of the event
			$audit = new History;
			$audit->nick_id = $crossword->nick_id;
			$audit->crossword_id = $crossword->id;
			$audit->language = $crossword->language;
			$audit->reported = $crossword->reported;
			$audit->save();
		}
		
		//delete crossword
		$crossword->delete();
		
		return null;
		
	}
	
	//save the progress made while taking a crossword wip
	public function progress() {
		
		//get data sent
		$data = Input::all();
		
		//define mode
		$continue = is_numeric($data["id"]);
		
		//clean data
		$data["progress"] = Helpers::xss_clean($data["progress"]);
		$mail = !$continue && Helpers::valid_mail($data["contact"]) ? $data["contact"] : "";
		
		//set progress
		$progress = $continue ? Wip::find($data["id"]) : new Wip;
		if($continue && count($progress) != 1) return json_encode("DELETED"); //the saved progress that is being updated has been deleted
		$progress->crossword_id = $data["crossword"];
		if(!$continue) $progress->token = Helpers::encryptor(Hash::make(time().mt_rand()));
		if(!$continue) $progress->contact = $mail;
		$progress->work = $data["progress"];
		$progress->save();
		
		//send mail with link to the saved progress
		if(!$continue && $mail != "") Mail::queue("emails.email", ["mode" => "wip", "id" => $progress->id, "token" => $progress->token], function($message) {
			$message->to(Input::get("contact"), "Guest")->subject("You have saved your progress on a crossword");
		});
		
		//send feedback
		if(!$continue) Session::put('feedback', '1');
		return $continue ? json_encode("true") : json_encode("javascript:window.location = HOST + '/crossword/wip/".$progress->id."/".$progress->token."'");
		
	}
	
	// discard progress
	public function discard() {
		
		//get data sent
		$data = Input::get("id");
		
		//get record of saved progress
		$progress = Wip::find($data);
		
		//perform action
		if(count($progress) == 1) $progress->delete();
		
		return null;
		
	}
	
	//report a crossword with errors
	public function report() {
		
		//get data sent
		$data = Input::all();
		
		//get crossword reported
		$crossword = Crossword::with("nick")->where("id", $data["crossword"])->first();
		
		if(count($crossword) == 0) return json_encode("DELETED"); //the crossword was removed while was reported
		
		//set report record
		$report = new Report;
		$report->nick_id = $crossword->nick->id;
		$report->crossword_id = $crossword->id;
		$report->complaint = Helpers::xss_clean($data["complaint"]);
		$report->status = "pending";
		$report->save();
		
		//update crossword on reporting
		$crossword->reported += 1;
		$crossword->save();
		
		return json_encode("true");
		
	}
	
}