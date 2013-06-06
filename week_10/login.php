<?php
//connect to DB
require_once("connect.php");
session_start();
//filter input (as always)
$data = (Object) filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//figure out the expected hash
$hash = hash("sha256", $salt.$_POST['password']);
//get our user
$userPointer = $db->query("SELECT * FROM `users` WHERE `username` LIKE '$data->username'");
if($userPointer->num_rows == 1)
{
	$user = $userPointer->fetch_object();
	//compare the password
	if($user->password == $hash)
	{
		$_SESSION['uid'] = $user->id;
		//really bad cookie practice
		setcookie("username", $user->username, time() + (30*24*60*60));
		setcookie("hash", $user->password, time() + (30*24*60*60));
		header("Location: account.php");
		die();
	}
}
header("Location: ./");