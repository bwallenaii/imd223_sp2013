<?php session_start(); ?><html>
<head>
	<title>Log in</title>
</head>
<body>
<?php
if(!empty($_SESSION['error']))
{
    echo "<div class=\"error\">".$_SESSION['error']."</div>";
}

if(!empty($_SESSION['success']))
{
    echo "<div class=\"success\">".$_SESSION['success']."</div>";
}

//clear out the messages
$_SESSION['error'] = null;
$_SESSION['success'] = null;
?>

<hr />
	<form action="login.php" enctype="multipart/form-data" method="post">
		<label>
			Username: 
			<input type="text" name="username" />
		</label>
		<label>
			Password:
			<input type="password" name="password" />
		</label>
		<input type="submit" />
	</form>
<hr />
<h2>Sign up!</h2>
<form action="signup.php" enctype="multipart/form-data" method="post">
		<label>
			Username: 
			<input type="text" name="username" />
		</label>
		<label>
			Password:
			<input type="password" name="password" />
		</label>
        <label>
			Confirm Password:
			<input type="password" name="confirm_password" />
		</label>
		<input type="submit" />
	</form>
</body>
</html>