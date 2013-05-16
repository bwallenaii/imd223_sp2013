<?php
require_once("validate.php");

?>
<html>
<head>
	<title>Welcome!</title>
</head>
<body>
	<h1>Welcome, <?php echo $user->username; ?>!</h1>
	<p>You should check out our other <a href="secure.php">secure</a> page! Or,
		you could just <a href="logout.php">log out.</a></p>
</body>
</html>




