<?php

function buildTag($content, $tag = "div")
{
	$tag = "<$tag>$content</$tag>";
	return $tag;
}

function paragraph($content = "")
{
	return buildTag($content, "p");
}

/*
1. The server mysql is running on. If same as the server the php file is on, 
	you can use localhost.
2. User name that can connect to the database (set up in your control panel)
3. Password for the above user. (also set up in your control panel)
4. Name of the database you are accessing.
*/
$db = new Mysqli("localhost", "examplesp2013", "pass123", "examplesp2013");
//check to see if connection worked
if($db->connect_errno)
{
	die("<br /><br />$db->connect_errno: $db->connect_error");
}