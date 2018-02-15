<?php
include("/Users/Donovan/Sites/sn/classes/DB.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

$pdo = new PDO('mysql:host=127.0.0.1; dbname=SocialNetwork;charset=utf8', 'root','people');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_POST['createaccount'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];



        if (!DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$username))) {
            if (strlen($username) >= 3 && strlen($username) <= 32) {
                if (preg_match('/[a-zA-Z0-9_]+/', $username)) {
                    if (strlen($password) >= 6 && strlen($password) <= 60) {
        	            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                            if(!DB::query('SELECT email FROM users WHERE email=:email', array(':email' => $email))){

                            

                            DB::query('INSERT INTO users VALUES (NULL, :username, :password, :email)', array(':username'=>$username, ':password'=>password_hash($password, PASSWORD_BCRYPT), ':email'=>$email));
                                           echo "Success!";
                            }
                            else{
                                echo 'Email in use!';}
                        } 
                        else { echo 'Invalid email!';}
                    } 
                    else {echo 'Invalid password!';}
                } 
                else{echo 'Invalid username';}
            } 
         	else {echo 'Invalid username';}
        } 
        else { echo 'User already exists!';}
}


?>

<h1>Register</h1>
<form action="create-account.php" method="post">
<input type="text" name="username" value="" placeholder="Username..."><p />
<input type="password" name="password" value="" placeholder="Password..."><p />
<input type="email" name="email" value="" placeholder="someone@somesite.com"><p />
<input type="submit" name="createaccount" value="Create Account"><p />
</form>