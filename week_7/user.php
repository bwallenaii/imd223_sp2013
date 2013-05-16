<?php
/**
 * To use:
 * Browse to user.php and add get variables as such:
 * user.php?u=<username>&p=<password>
 * Example: user.php?u=bob&p=pass123
*/
require_once("connect.php");
$on = false;

if($on)
{
	$data = (Object) filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
	$hash = hash("sha256", $salt.$_GET['p']);
	$query = "INSERT INTO `users` (`username`, `password`) VALUES ('$data->u', '$hash');";
	$db->query($query);

	if($db->errno)
	{
		die($db->error."<br /><br />".$query);
	}
}

echo "complete.";