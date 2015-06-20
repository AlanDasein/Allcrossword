<?php

class Helpers {
    
	public static function format_date($date) {
		$aux = explode('-', $date); //sql date format: $date = [year, month, day]
		$months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
		return count($aux) == 3 ? $months[$aux[1] - 1].' '.$aux[2].', '.$aux[0] : $date;
	}
	
	public static function encryptor($value) {
		$key = pack('H*', "bcb04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");
		$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
		$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
		$utf8 = utf8_encode($value);
		$cipher = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $utf8, MCRYPT_MODE_CBC, $iv);
		$cipher = $iv.$cipher;
		$base64 = base64_encode($value);
		return str_shuffle($base64);
	}
	
	public static function valid_mail($mail) {
		$valid = 0;
		if(
			(strlen($mail) >= 6 && substr_count($mail, "@") ==1 ) && (substr($mail, 0, 1) != "@") && (substr($mail, strlen($mail) - 1, 1) != "@") && 
			!strstr($mail, "'") && !strstr($mail, '"') && !strstr($mail, "\\") && !strstr($mail, "$") && !strstr($mail, " ") && substr_count($mail, ".") >= 1
		) {
			$domain = substr(strrchr($mail, '.'), 1);
			if(strlen($domain) > 1 && strlen($domain) < 5 && (!strstr($domain, "@"))) {
				$bf_domain = substr($mail, 0, strlen($mail) - strlen($domain) - 1);
				$last_char = substr($bf_domain, strlen($bf_domain) - 1, 1);
				if($last_char != "@" && $last_char != ".") $valid = 1;
			}
		}
		return $valid;
	}
	
	public static function xss_clean($data) {
		$data = trim($data);
		$data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
		$data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
		$data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
		$data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');
		$data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);
		$data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
		$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
		$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);
		$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
		$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
		$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);
		$data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);
		do {
			$old_data = $data;
			$data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
		}
		while ($old_data !== $data);
		return $data;
	}
	
	public static function valid_input($value) {
		$value = trim($value);
		return preg_replace("/[^ \w]+/", "", $value);
	}
	
}