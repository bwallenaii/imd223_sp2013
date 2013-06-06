<?php
    require_once("classes/product.php");
    
    $data = (Object) $_POST;
    $product = new Product();
    $product->name = $data->name;
    $product->price = $data->price;
    if($_FILES["image"]['error'] == 0)
    {
    	$type = $_FILES['image']['type'];
    	if($type == "image/jpeg" || $type == "image/png" || $type == "image/gif")
    	{
    		$newName = time()."_".$_FILES['image']['name'];
    		if(move_uploaded_file($_FILES['image']['tmp_name'], "uploads/$newName"))
    		{
    			$product->image = "uploads/$newName";
    		}
    	}
    }
    
    $product->save();
    
    $product->addDistributors($data->distributors);
    
    header("Location: ./dbexample.php");