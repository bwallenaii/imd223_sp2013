<?php
require_once("connect.php");
session_start();
$user = null;
//verify they are logged in
if(!empty($_SESSION['uid']))
{
	//get the logged in user
	$userPointer = $db->query("SELECT * FROM `users` WHERE `id` = ".$_SESSION['uid']);
	$user = $userPointer->fetch_object();
}
//if no user, send back home
if(empty($user))
{
	header("Location: ./");
	die();
}