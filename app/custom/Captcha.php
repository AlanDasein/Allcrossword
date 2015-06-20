<?php

class Captcha {
    
    public static function verify($val) {
        
		$params = array();
		$params['secret'] = '6LdmeAITAAAAAHZZDyiiNxr1hb2aawod481U_Eus';
		$params['response'] =  urlencode($val);
		$params['remoteip'] = $_SERVER['REMOTE_ADDR'];

		$params_string = http_build_query($params);
		$requestURL = 'https://www.google.com/recaptcha/api/siteverify?'.$params_string;

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => $requestURL,
		));

		$response = curl_exec($curl);
		curl_close($curl);

		$response = @json_decode($response, true);

		if($response["success"] == true) return true;
		else return false;
		
    }

}