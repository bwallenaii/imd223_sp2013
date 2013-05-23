<?php

require_once("dummy.php");

$dmy = new Dummy();
$dmy2 = new Dummy();
$dmy3 = new Dummy();

$dmy->name = "Fred";

//$dmy->doNothing(); //flagrant system error!!!!

?>
<html>
<head>
	<title>Class usage Example</title>
</head>
<body>
<?php

$dmy->doSomething();

$dmy->stopWorking();

echo "<br /><br />";
echo Dummy::getNumInstances();

unset($dmy3);

?>
<hr />
</body>
</html>