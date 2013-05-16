<?php require_once("validate.php"); ?>
<html>
<head>
	<title>Secure</title>
</head>
<body>
	<h2>Logged in</h2>
	<p>Only logged in people, like <?php echo $user->username ?>, can get here. Don't you feel special?</p>
	<p>Ok, now <a href="logout.php">log out.</a></p>
	<p>By the way, we stored your user name in a cookie. We use it here:
		<?php echo $_COOKIE['username']; ?>
	</p>
</body>
</html>