<?php
require_once("connect.php");

$products = $db->query("SELECT * FROM `products` LIMIT 0,10");

if($db->errno)
{
	die("<br /><br />$db->errno: $db->error");
}

?>
<html>
<head>
	<title>Our Products</title>
	<style>
		.product{
			border-bottom: 1px dashed #444444;
		}
		.product h3{
			margin-bottom: 0;
		}
		.product img{
			float: left;
			width: 150px;
		}
		.product p{
			margin-top: 0;
		}
		.product:after{
			content: ".";
		    display: block;
		    height: 0;
		    clear: both;
		    visibility: hidden;
		}
	</style>
</head>
<body>
	<h1>We are here</h1>
		<?php
		while($product = $products->fetch_object())
		{
			?>
		<div class="product">
			<?php if(!empty($product->image)): ?>
			<img src="<?php echo $product->image; ?>" />
			<?php endif; ?>
			<h3><a href="product.php?pid=<?php echo $product->id; ?>" ><?php echo $product->name; ?></a></h3>
			<?php echo paragraph("Price: \$$product->price"); ?>
		</div>
			<?php
		}
		?>
</body>
</html>




















