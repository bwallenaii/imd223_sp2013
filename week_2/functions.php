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

//recursive 
function barfArray($arg, $depth = 0)
{
	if(is_array($arg))
	{
		foreach($arg as $item)
		{
			barfArray($item, $depth + 1);
		}
	}
	else
	{
		for($i = 0; $i < $depth;++$i)
		{
			echo "\t";
		}
		echo "$arg\r\n";
	}
	
}

?>
<html>
<head>
	<title>Using the buildTag Function</title>
</head>
<body>

<?php
	$div1 = buildTag(paragraph("A dog ate my code.").paragraph("No, really. It happened."));
	echo buildTag("Title!", "h3");
	echo $div1;
?>

<pre>
<?php
	$myray = array(
		"Test 1", 
		"Test 2",
		array(
			"Rig 1",
			"Rig 2",
			"Rig 3",
			array(
				"Yip 1",
				"Yip 2"
			),
		),
		"Test 3",
		"Test 4");
	barfArray($myray);
?>
</pre>
</body>
</html>










