
<html>
<head>
	<title></title>
	<style>
		body{
			font-family: courier;
		}
	</style>
</head>
<body>
<?php

//phpinfo();
/**
 * Using crypt()
*/
$pass = "pass123"; //user's password
$hash = crypt($pass); //resulting hash (stored in DB)
echo $hash;

echo "<br />";

//if(crypt($pass, $hash) == $hash)//good match
if(crypt("badpass", $hash) == $hash)//bad match
{
	echo "Logged in!";
}
else
{
	echo "Password bad. You not hacker.";
}
?>
<hr />
<?php
/**
 * Using hash()
*/
$key = "go3Ag8ghI0ouaEghiOUhP03o";
$myPass = "pass123";
$hash2 = hash("sha256", $key.$myPass);

echo $hash2;

if(hash("sha256", $key.$myPass) == $hash2)
{
	echo "Login good.";
}

?>
</body>
</html>














