<?php
    require_once("classes/product.php");
    require_once("classes/element.php");
    
    $products = Table::build("Product")->getPage();
    
?><!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />

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

<?php
		foreach($products as $product)
		{
			?>
		<div class="product">
			<?php if($product->image): ?>
			<img src="<?php echo $product->image; ?>" />
			<?php endif; ?>
			<h3><a href="product.php?pid=<?php echo $product->id; ?>" ><?php echo $product->name; ?></a></h3>
			<?php echo new Element("p", "Price: \$$product->price"); 
			 echo new Element("p", "Distributed by: ".$product->implodeDistributors()); ?>
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
			$distributors = Table::build("Distributor")->getAll();
			foreach($distributors as $distributor)
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