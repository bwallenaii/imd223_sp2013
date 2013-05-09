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

		label{
			display: block;
		}
		textarea{
			display: block;
			width: 300px;
			height: 200px;
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

	<h3>Add a Product</h3>
	<form action="add.php" enctype="multipart/form-data" method="post">
		<label>
			Name: <input type="text" name="name" />
		</label>
		<label>
			Price: <input type="text" name="price" />
		</label>
		<label>
			Description:
			<textarea name="description"></textarea>
		</label>
		<label>
			<input type="file" name="image" />
		</label>
		<h4>Distributors</h4>
		<?php
			$distributors = $db->query("SELECT * FROM `distributors`");
			while($distributor = $distributors->fetch_object())
			{
				?>
				<label>
					<input type="checkbox" name="distributors[]" value="<?php echo $distributor->id; ?>" />
					<?php echo $distributor->name; ?>
				</label>
				<?php
			}
		 ?>
		<input type="submit" />
	</form>
</body>
</html>




















