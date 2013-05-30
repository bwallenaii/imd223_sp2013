<?php
    require_once("classes/database.php");
    $db = new Database();
    $data = (Object) $_POST;
    if($_FILES["image"]['error'] == 0)
    {
    	$type = $_FILES['image']['type'];
    	if($type == "image/jpeg" || $type == "image/png" || $type == "image/gif")
    	{
    		$newName = time()."_".$_FILES['image']['name'];
    		if(move_uploaded_file($_FILES['image']['tmp_name'], "uploads/$newName"))
    		{
    			$data->image = "uploads/$newName";
    		}
    	}
    }
    
    
    
    $db->insert("products", $data);
    
    header("Location: ./dbexample.php");