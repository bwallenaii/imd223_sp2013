<html>
<head>
	<title>PHP Example</title>
</head>
<body>

<?php require("header.php"); ?>

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<pre>
<?php

$awesome = array("Fred", "Richard");

print_r($awesome);

$awesome[] = "Wilma";

print_r($awesome);

$person = array_pop($awesome);

print_r($awesome);
print_r($person);

$student = array(
	'firstName' => "Bob", 
	'lastName' => "Hendricks",
	'id' => "78523914473",
);
$student['age'] = 25;

print_r($student);

?>
</pre>
<p>
	<?php
		//translate student into an object
		$student = (Object) $student;
		echo "Hello, $student->firstName!";
	?>
</p>
<?php
	for($i = 0; $i < count($awesome);++$i)
	{
		echo $awesome[$i]."<br />";
	}
?>

<hr />
<?php
	foreach($student as $k => $v)
	{
		echo "$k: $v <br />";
	}
?>

</body>
</html>
















