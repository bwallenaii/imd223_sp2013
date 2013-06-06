<?php

require_once("connect.php");
session_start();
//clear out the messages
$_SESSION['error'] = null;
$_SESSION['success'] = null;
	
$data = (Object) filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

//check password confirm
if($_POST['password'] != $_POST['confirm_password'] 
    || empty($_POST['password']))
{
    //die("There was an issue with the password.");
    $_SESSION['error'] = "Password and confirmation do not match.";
}
else
{
    $hash = hash("sha256", $salt.$_POST['password']);
    $query = "INSERT INTO `users` (`username`, `password`) VALUES ('$data->username', '$hash');";
    $db->query($query);
}


if($db->errno)
{
	//die($db->error."<br /><br />".$query);
    $_SESSION['error'] = "Cannot add user. Please try again later.";
}

if(empty($_SESSION['error']))
{
    $_SESSION['success'] = "You have been added and may log in now.";
}

header("Location: ./");










