<?php
include("/Users/Donovan/Sites/sn/classes/DB.php");


function isLoggedIn(){
	if(isset($_COOKIE['SNID'])){
		if(DB::query('SELECT user_id FROM login_tokens WHERE token = :token'), array(':token'=>sha1($_COOKIE['SNID']))){
			DB::query('SELECT user_id FROM login_tokens WHERE token = :token'), array(':token'=>sha1($_COOKIE['SNID']))[0]['user_id'];
			return $user_id;
		}
	}

	return false;
}

if(isLoggedin()){
	echo 'Logged In';
} 
else { echo 'Not logged in';}


?>