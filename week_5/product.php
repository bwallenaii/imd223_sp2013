<?php
	require_once("connect.php");

	if(empty($_GET['pid']) || !is_numeric($_GET['pid']))
	{
		die("smurf.");
	}

	$res = $db->query("SELECT * FROM `products` WHERE `id` = ".$_GET['pid']);
	$product = $res->fetch_object();
?>
<html>
<head>
	<title><?php echo $product->name; ?></title>
	<style>
		img{
			float: left;
		}
	</style>
</head>
<body>
	<?php if(!empty($product->image)): ?>
	<img src="<?php echo $product->image; ?>" />
	<?php endif; 
		echo buildTag("<a href=\"product.php?pid=$product->id\" >$product->name</a>", "h3");
		echo paragraph("Price: \$$product->price");
		echo paragraph($product->description);
	?>
</body>
</html>









