<?php
include("/Users/Donovan/Sites/sn/classes/DB.php");
include("/Users/Donovan/Sites/sn/classes/Login.php");



if( Login::isLoggedIn() ){
	echo 'Logged In';
	echo Login::isLoggedIn();
} 
else { echo 'Not logged in';}


?>