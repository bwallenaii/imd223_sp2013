<?php
require_once("connect.php");
$data = (Object) filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

$imagePath = "";

if($_FILES["image"]['error'] == 0)
{
	$type = $_FILES['image']['type'];
	if($type == "image/jpeg" || $type == "image/png" || $type == "image/gif")
	{
		$newName = time()."_".$_FILES['image']['name'];
		if(move_uploaded_file($_FILES['image']['tmp_name'], "uploads/$newName"))
		{
			$imagePath = "uploads/$newName";
		}
	}
}

$sql = "INSERT INTO `products` (`name`,`price`,`description`,`image`)".
		" VALUES ('$data->name','$data->price','$data->description','$imagePath');";

$db->query($sql);

if($db->errno)
{
	die("Horrible SQL error: $db->error <br /><br />You said: <br />$sql");
}

//Setting up relationship
//--get last entered product
$prodRes = $db->query("SELECT * FROM `products` ORDER BY `id` DESC LIMIT 1");
$product = $prodRes->fetch_object();
//go through the array of distributor ids from the form
foreach($data->distributors as $distId)
{
	//add to relationary table
	$db->query("INSERT INTO `distributors_has_products` (`product_id`, `distributor_id`) VALUES ($product->id, $distId) ");
	if($db->errno)
	{
		die("Horrible SQL error: $db->error <br /><br />You said: <br />$sql");
	}
}


//redirect the user
header("Location: ./");
















