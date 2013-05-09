<?php
	require_once("connect.php");

	if(empty($_GET['pid']) || !is_numeric($_GET['pid']))
	{
		die("smurf.");
	}

	$data = (Object) filter_input_array(INPUT_GET, FILTER_SANITIZE_NUMBER_INT);

	$res = $db->query("SELECT * FROM `products` WHERE `id` = $data->pid");
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

		//get correlating distributor ids
		$distribIdRes = $db->query("SELECT `distributor_id` FROM `distributors_has_products` WHERE `product_id` = $product->id");
		//extract data
		$distribNames = array();
		while($did = $distribIdRes->fetch_object())
		{
			//pull the current distributor
			$nameRes = $db->query("SELECT `name` FROM `distributors` WHERE `id` = $did->distributor_id");
			//fetch the data for this dist.
			$resData = $nameRes->fetch_object();
			//store the name in an array
			$distribNames[] = $resData->name;
		}
		//show our results on the page
		echo paragraph("Distributed by: ".implode($distribNames, ", "));

	?>


</body>
</html>









